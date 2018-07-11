<?php
/**
 * Created by PhpStorm.
 * User: PS_HUYNH
 * Date: 09/07/2018
 * Time: 2:37 CH
 */
?>

@if (count($errors) > 0)
    <ul class="error_msg">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
