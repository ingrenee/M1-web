<h1>Ficha de usuario</h1>



<!--<pre class="notice"><?php var_dump($profile); ?></pre>-->

<div class="fila">
<span class="fila_legenda">Nombres: </span><span class="fila_contenido"><?PHP echo $profile->nombres;?></span>
</div>
<div class="fila">
<span class="fila_legenda">Apellidos: </span><span class="fila_contenido"><?PHP echo $profile->apellidos;?></span>
</div>
<div class="fila">
<span class="fila_legenda">Direccion: </span><span class="fila_contenido"><?PHP echo $profile->direccion;?></span>

</div>
<div class="fila">
<span class="fila_legenda">Fecha de nacimiento: </span><span class="fila_contenido"><?PHP echo $profile->fnacimiento;?></span>

</div>
<div class="fila">
<span class="fila_legenda">Ultima actualizacion: </span><span class="fila_contenido"><?PHP echo $profile->modificado;?></span>

</div>