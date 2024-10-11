<?php

namespace Chaiqou\Framework\Routing;

use Chaiqou\Framework\Http\Request;
interface RouterInterface
{

    public function dispatch(Request $request);

}