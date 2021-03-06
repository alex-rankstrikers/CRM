<?php namespace OutlookRestClient\Facade\Responses;
/**
 * Copyright 2017 OpenStack Foundation
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 **/

/**
 * Class ErrorResponse
 * @package OutlookRestClient\Facade\Responses
 */
final class ErrorResponse extends AbstractResponse
{
    /**
     * @return string|null
     */
    public function getErrorCode(){
        return isset($this->content["error"]) && isset($this->content["error"]["code"]) ? $this->content["error"]["code"]:null;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(){
        return isset($this->content["error"]) && isset($this->content["error"]["message"]) ? $this->content["error"]["message"]:null;
    }
}