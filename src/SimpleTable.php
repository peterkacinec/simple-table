<?php

namespace KornerBI\SimpleTable;

/**
 * Class SimpleTable
 * @package KornerBI\UserManagement
 */
class SimpleTable
{
    protected $data;
    protected $columns;
    protected $actions;
    protected $entityRoutePrefix;

    /**
     * SimpleTable constructor.
     *
     * @param $entityRoutePrefix String define base url link for action button
     * @param $data array of data, that shows in table
     * @param $columns array of columns desc
     * @param $actions array of action buttons
     */
    public function __construct($columns = [], $data = [], $entityRoutePrefix = '', $actions = null)
    {
        $this->data = $data;
        $this->columns = $columns;

        if (is_null($actions)) {
            $this->entityRoutePrefix = $entityRoutePrefix;
            $this->actions = $this->getDefaultActions();
        } else {
            $this->actions = $actions;
        }
    }

    /**
     * Sets default actions 'Detail' and 'Delete' for every row in table
     *
     * @return array[]
     */
    private function getDefaultActions() {
        return [
            [
                'label' => '<i class="material-icons">visibility</i>',
                'title' => __('user-management::general.Detail'),
                'key' => 'detail',
                'class' => 'btn btn-primary btn-sm mr-1',
                'link' => [
                    'prefix' => $this->entityRoutePrefix,
                    'attribute' => 'id',
                ]
            ],
            [
                'label' => '<i class="material-icons">edit</i>',
                'title' => __('user-management::general.Edit'),
                'key' => 'edit',
                'class' => 'btn btn-primary btn-sm mr-1',
                'link' => [
                    'prefix' => $this->entityRoutePrefix,
                    'attribute' => 'id',
                    'postfix' => '/edit'
                ]
            ],
            [
                'label' => '<i class="material-icons">delete</i>',
                'title' => __('user-management::general.Delete'),
                'key' => 'delete',
                'class' => 'btn btn-danger btn-sm',
                'link' => [
                    'prefix' => $this->entityRoutePrefix,
                    'attribute' => 'id',
                ]
            ]
        ];
    }

    /**
     * Sends data to blade template, which contains Vue component
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        return view('simple-table::simple-table', ['config' => [
            'data' => $this->data,
            'columns' => $this->columns,
            'actions' => $this->actions
        ]]);
    }
}
