<?php

class Get extends RestMethod {

    /**
     * @return array
     */
    public function execute(){
        $this->setUp();
        $this->executeCurl();
        $result = $this->getResult();
        $this->tearDown();
        return $result;
    }
}