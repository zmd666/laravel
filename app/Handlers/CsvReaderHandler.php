<?php
namespace App\Handlers;

class CsvReaderHandler
{
    private $csv_file;
    private $spl_object = null;
    private $error;

    public function __construct($csv_file = '')
    {
        if ($csv_file && file_exists($csv_file)) {
            $this->csv_file = $csv_file;
        }
    }

    public function set_csv_file($csv_file)
    {
        if (!$csv_file || !file_exists($csv_file)) {
            $this->error = 'File invalid';
            return false;
        }
        $this->csv_file = $csv_file;
        $this->spl_object = null;
    }

    public function get_csv_file()
    {
        return $this->csv_file;
    }

    private function _file_valid($file = '')
    {
        $file = $file ? $file : $this->csv_file;
        if (!$file || !file_exists($file)) {
            return false;
        }
        if (!is_readable($file)) {
            return false;
        }
        return true;
    }

    private function _open_file()
    {
        if (!$this->_file_valid()) {
            $this->error = 'File invalid';
            return false;
        }
        if ($this->spl_object == null) {
            $this->spl_object = new \SplFileObject($this->csv_file, 'rb');
        }
        return true;
    }

    public function get_data($length = 0, $start = 0)
    {
        if (!$this->_open_file()) {
            return false;
        }
        $length = $length ? $length : $this->get_lines();
//        $start = $start - 1;
        $start = ($start < 0) ? 0 : $start;
        $data = array();
        $this->spl_object->seek($start);
        while ($length-- && !$this->spl_object->eof()) {
            //$data[] = $this->spl_object->fgetcsv();//不用fgetcsv方法了
            $current = $this->spl_object->current();//current方法不会跳行
            $encode = mb_detect_encoding($current, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
            $current = mb_convert_encoding($current, 'UTF-8', $encode);
            $data[] = trimArray(str_getcsv($current));//再转成数组

            $this->spl_object->next();
        }
        return $data;
    }

    public function get_lines()
    {
        if (!$this->_open_file()) {
            return false;
        }
        $this->spl_object->seek(filesize($this->csv_file));
        return $this->spl_object->key();
    }

    public function get_error()
    {
        return $this->error;
    }
}

