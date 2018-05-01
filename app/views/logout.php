<?php
session_unset();
session_destroy();
header("Location:".APP['DOC_ROOT'] . 'page/login');