<?php

namespace hoaaah\LaravelBreadcrumb;

use Illuminate\Support\Facades\Request;
use LogicException;

/**
 * Create Breadcrumb based on Bootstrap 4 Template
 *
 * example use of this widget
 *
 * ```php
 * Breadcrumb::widget([
 *     'items' => [
 *         ['label' => 'Link 1'],
 *         ['url' => route('route.name'), 'label' => 'Link 2'],
 *         ['label' => $this->title]
 *     ]
 * ]);
 * ```
 *
 * @package hoaaah\LaravelBreadcrumb
 *
 * @author  hoaaah (heru@simda.id)
 */
class Breadcrumb
{
    public $homeUrl = '/';
    public $homeText = ' Home';
    public $tagWrapper = 'ol';
    public $tagItemWrapper = 'li';
    public $breadcrumbClass = 'breadcrumb';
    public $breadcrumbItemClass = 'breadcrumb-item';
    public $itemActiveClass = 'active';


    /**
     * Return widget of breadcrumb
     *
     * Example use of this widget
     * ```php
     * Breadcrumb::widget([
     *     'items' => [
     *         ['label' => 'Link 1'],
     *         ['url' => '/link2', 'label' => 'Link 2'],
     *         ['label' => $this->title]
     *     ]
     * ]);
     * ```
     * @param array $config configuration of this widget
     */
    public static function widget(array $configs)
    {
        $breadcrumbClass = new self();
        $return = '';
        $items = '';

        if (isset($configs['homeUrl'])) $breadcrumbClass->homeUrl = $configs['homeUrl'];

        if (isset($configs['tagWrapper'])) $breadcrumbClass->tagWrapper = $configs['tagWrapper'];

        if (!isset($configs['items'])) {
            throw new LogicException('This widget need <code>items</code> configuration');
        }

        $return .= $breadcrumbClass->begin();
        $return .= $breadcrumbClass->renderItems($configs['items']);
        $return .= $breadcrumbClass->end();

        return $return;
    }


    public function begin()
    {
        $urlUnique = null;
        $return = '';
        foreach (Request::segments() as $segments) {
            $urlUnique .= '/' . $segments;
        }
        if ($urlUnique != '/') {
            $return = '
            <' . $this->tagWrapper . ' class="' . $this->breadcrumbClass . '">
                <li class="' . $this->breadcrumbItemClass . '"><a href="' . $this->homeUrl . '"><i class="fas fa-home"></i>' . $this->homeText . '</a></li>';
        } else {
            $return = '';
        }
        return $return;
    }

    public function renderItems(array $items)
    {
        $return = '';
        foreach ($items as $item) {
            $return .= $this->add($item);
        }

        return $return;
    }

    public function add($params)
    {
        if (!array_key_exists('url', $params)) {
            $params['url'] = '';
            $tag = 'span';
        } else {
            $params['url'] = 'href="' . $params['url'] . '"';
            $tag = 'a';
        }
        if (!array_key_exists('label', $params)) {
            // $params['label'] = 'Use label params!';
            throw new LogicException('This $items need <code>label</code> configuration');
        }
        $return = "<{$this->tagItemWrapper} class='{$this->breadcrumbItemClass}'><" . $tag . ' ' . $params['url'] . ' >' . $params['label'] . '</' . $tag . "></{$this->tagItemWrapper}>";
        return $return;
    }

    public function end()
    {
        $return = "</{$this->tagWrapper}>";
    }
}
