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
	class Alanstormdotcom_Systemsearch_Block_Template extends Mage_Core_Block_Template
	{
		protected function _checkValidScriptPath($scriptPath)
		{
			$paths_to_check = array(Mage::getBaseDir('design'),Mage::getModuleDir('', 'Alanstormdotcom_Systemsearch'));
			$valid			= false;
			foreach($paths_to_check as $path)
			{
				if(strpos($scriptPath, realpath($path)) === 0)
				{
					$valid = true;
				}
			}
			return $valid;		
		}
		
		public function setScriptPath($dir)
		{
			$scriptPath = realpath($dir);
			if ($this->_checkValidScriptPath($scriptPath)) {
				$this->_viewDir = $dir;
			} else {
				Mage::log('Not valid script path:' . $dir, Zend_Log::CRIT, null, null, true);
			}
			return $this;
		}
		
        public function fetchView($fileName)
        {
            //ignores file name, just uses a simple include with template name
            $this->setScriptPath(Mage::getConfig()->getModuleDir('','Alanstormdotcom_Systemsearch') . '/phtml');
            return parent::fetchView($this->getTemplate());
        }
	
	}