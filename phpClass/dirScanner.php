<?php
class dirScanner {

	protected $filesArr = [];
	
	public function __construct($dirrectory) {
		$this->dirrectory = $dirrectory;
	}
	
	protected function scanDirs($dirrectory) {
		$dirrectory_call_back = $dirrectory;
		$public = scandir($dirrectory_call_back);
		foreach ($public as $value) {
			if ($value !== "." && $value !== "..") {
				$dirrectory = $dirrectory_call_back."/".$value;
				if (is_file($dirrectory)) {
					$this->filesArr[] = $dirrectory;
				} else {
					$this->scanDirs($dirrectory);
				};
			};
		};
	}
	
	protected function creatFilesArr() {
		foreach ($this->filesArr as $i => $name) { 
			unset($this->filesArr[$i]); 
		};
		$this->scanDirs($this->dirrectory);
	}
	
	public function showAllFiles() {
		$this->creatFilesArr();
		foreach ($this->filesArr as $value) {
			echo $value."<br>";
		};
	}
	
	public function getFilesArr() {
		$this->creatFilesArr();
		return $this->filesArr;
	}

}

?>
