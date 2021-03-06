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
                'label' => '<img src="'.asset('simple-table/assets/image/visibility-white-18dp.svg').'"/>',
                'title' => __('simple-table::general.Detail'),
                'key' => 'detail',
                'class' => 'btn btn-primary btn-sm mr-1',
                'url' => url(config('simple-table.route-prefix').$this->entityRoutePrefix.'{id}')
            ],
            [
                'label' => '<img src="'.asset('simple-table/assets/image/edit-white-18dp.svg').'"/>',
                'title' => __('simple-table::general.Edit'),
                'key' => 'edit',
                'class' => 'btn btn-primary btn-sm mr-1',
                'url' => url(config('simple-table.route-prefix').$this->entityRoutePrefix.'{id}/edit')
            ],
            [
                'label' => '<img src="'.asset('simple-table/assets/image/delete-white-18dp.svg').'"/>',
                'title' => __('simple-table::general.Delete'),
                'key' => 'delete',
                'class' => 'btn btn-sm btn-danger',
                'url' => url(config('simple-table.route-prefix').$this->entityRoutePrefix.'{id}'),
                'dataToggle' => 'modal',
                'dataTarget' => '#modalConfirm',
                'modalText' => __('simple-table::general.Confirmation delete')
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
