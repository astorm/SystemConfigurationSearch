<?php
/**
* Open Source Initiative OSI - The MIT License (MIT):Licensing
* 
* The MIT License (MIT)
* Copyright (c) 2009 - 2011 Pulse Storm LLC
* 
* Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
* 
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
	class Alanstormdotcom_Systemsearch_Block_Searchresults extends Alanstormdotcom_Systemsearch_Block_Template
	{
		protected $_resultsArray;
		
		const ARROW_SEP =  ' <span style="font-family:fixed">-&gt;</span> ';
		public function __construct()
		{
			$this->setTemplate('results.phtml');
		}
		
		public function addResultsArray($array)
		{
			$array = array_unique($array);
			sort($array);
			$this->assignResultsArray($array);			
			return $this;
		}
		
		protected function assignResultsArray($array)
		{
			$this->_resultsArray = $array;
		}
		
		protected function fetchResultsArray()
		{
			return $this->_resultsArray;
		}
		
		protected function fetchStyledResultsArray()
		{
			return str_replace('/',self::ARROW_SEP,$this->fetchResultsArray());			
		}
	}