<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class VerificarController extends Controller
{
    public function edad()
    {
    	return view('verificar.edad');
    }

    public function registrarVerificacion()
    {
    	Session::put('edadConfirmada', true);
    	// return redirect()->route('records.index');
    	// Tratamos de redireccionarlo con "intended".
    	// "intended" intenta averiguar desde la petición del
    	// browser la URL a la que el usuario quiso acceder.
    	// Como no siempre está disponible, nos permite poner
    	// una URL default a donde enviar al usuario en ese caso.
    	// return redirect()->intended(route('records.index'));

    	$intendedUrl = Session::get('intendedUrl');
    	Session::forget('intendedUrl');

    	return redirect($intendedUrl);
    }
}
