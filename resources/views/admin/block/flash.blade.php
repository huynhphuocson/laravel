<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 09/07/2018
 * Time: 5:12 CH
 */
?>
@if (Session::has('flash_message'))
    <div class="{!! Session::get('flash-level') !!}">
        {!! Session::get('flash_message') !!}
    </div>
@endif