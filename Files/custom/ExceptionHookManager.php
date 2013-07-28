<?php
/**
 * Class ExceptionHookManager
 * @author Dan Lively (daniel.lively12@gmail.com)
 */

class ExceptionHookManager {

    /**
     * Handle Exceptions if the instance is in development mode
     * Handles both global and module specific calls
     * @param $event
     * @param $arguments
     */
    public function handle()
    {
        if ($this->isDev())
        {
            $args = func_get_args();
            $Exception = $args[1];

            $Run = new \Whoops\Run();
            $PageHandler = new \Whoops\Handler\PrettyPageHandler();

            if ($args[0] instanceof SugarBean)
            {
                $focus = $args[0];
                $Exception = $args[2];

                if ($this->showBean())
                {
                    $data = $this->getBeanData($focus);
                    $PageHandler->addDataTable('SugarBean', $data);
                }
            }

            if (! $Exception instanceof Exception)
            {
                $Exception = new Exception('Exception not passed to hook!');
            }

            $Run->pushHandler($PageHandler);
            $Run->handleException($Exception);
        }
    }

    /**
     * Loads Whoops Library and Registers Page Handler for generic PHP errors to be formatted as ErrorException
     * @param $event
     * @param $arguments
     */
    public function loadErrorHandler($event, $arguments)
    {
        if ($this->isDev())
        {
            require_once('custom/include/whoops-1.0.7/src/autoload.php');
            $GLOBALS['log']->debug('Loading Whoops Library');

            $Run = new \Whoops\Run();
            $Run->pushHandler(new \Whoops\Handler\PrettyPageHandler());

            $Run->register();
        }
    }

    /**
     * Determine if the instance is in development mode
     * @return bool
     */
    private function isDev()
    {
        return SugarConfig::getInstance()->get('whoops_dev', false);
    }

    /**
     * Returns fields for use in datatable on Page Handler
     * @param SugarBean $focus
     * @return array
     */
    protected function getBeanData(SugarBean $focus)
    {
        $data = array();

        foreach($focus->field_name_map as $fieldMap)
        {
            if ($fieldMap['type'] !== 'link')
            {
                $field = $fieldMap['name'];
                $data[$field] = $focus->$field;
            }
        }

        return $data;
    }

    /**
     * Checks config to allow SugarBean to be added as data table
     * @return bool
     */
    private function showBean()
    {
        return SugarConfig::getInstance()->get('whoops_show_bean', true);
    }

}