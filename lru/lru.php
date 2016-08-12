<?php
class LRU {

	//最大存储个数
	public $max = 10;

	//存储key的数组
	public $list = array();

	//存储值得数组
	public $data = array();

	//构造函数
	public function __construct($max) {
		$list = array();
		$this->max = $max;
	}

	//添加内容
	public function set($key, $value) {

		//判断是否存在
		$k = $this->isInArray($key);

		//如果超过数目 并且不存在 删除最后一个元素
		if (count($this->list) >= $this->max && $k == -1) {
			$v = array_pop($this->list);
			if (!is_null($v)) {
				unset($this->data[$v]);
			}
		}

		if ($k >= 0) {
			//如果存在 将元素挪动到头部
			unset($this->list[$k]);
			unset($this->data[$key]);
		}

		//添加到数组头部
		array_unshift($this->list, $key);
		$this->data[$key] = $value;
	}

	//获取内容
	public function get($key) {
		return $this->data[$key];
	}

	//判断是否在数组中，存在返回数组键值，不存在返回-1
	public function isInArray($key) {
		$k = array_search($key, $this->list);
		if ($k !== false) {
			return $k;
		} else {
			return -1;
		}
	}
}
