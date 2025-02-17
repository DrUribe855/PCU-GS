<div class="t-noticia-g">
	<div class="caja">				  
        <div class="bordes" >
            <class="fondonombre2-p">
                <div class="fondonombre-p borp">
                    <div class="fparriba font-museo">Perfil del personaje</div>
                    <?php 
                        $username = getUserDataById($connection, $userId, 'nombre');
                        $formattedName = str_replace(" ", "_", $username);
                    ?>
                    <div class="nombre-pj" style="text-align:center;"> <?= $formattedName ?> - <span style="color:#FFB900;">Nivel <?= getPrincipalUserInformationById($connection, $userId, 'nivel') ?></span></div><div style="text-align:center; color:#fff; font-size:18px;" class="nombre-pjs">
                    <?php 
                        $vip = getPrincipalUserInformationById($connection, $userId, 'vip');
                        if($vip == 1): ?>
                            Membresía <span style="color:#B96F46; text-align:center;">Bronze</span>
                        <?php elseif($vip == 2): ?>
                            Membresía <span style="color:#B9B9B9; text-align:center;">Silver</span>
                        <?php elseif($vip == 3): ?>
                            Membresía <span style="color:#FFD700; text-align:center;">Gold</span>
                        <?php endif ?>
                    <div style="text-align: center;">
                        <div class="mensajealerta maviso" style="width:60%; text-align: center;" >
                            <b>Estado:</b>
                            <br>
                            <?php
                                $status = getExtraUserInformation($connection, $userId, 'estado_texto');
                                if(empty($status)): ?>
                                    <span style="color:#FFB900;">Soy nuevo en Golden State</span>
                                <?php else: ?>
                                    <span style="color:#FFB900; text-align: center;"><?= $status ?></span>
                                <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mensajealerta mftitulo" style="width:80%;" ><b>Importante:</b><br>Este perfil <b>NO PUEDE</b> Mezclarse con el juego, si es asi, será penalizado.</div>
                <hr class="gs">
                <table style="width: 90%; text-align: center;" border="0" cellpadding="2" cellspacing="2">
					<tbody>
						<tr>
							<td style="width: 50%;">
						        <div class="telefo" style="color: black"><img src="../imagenes/iconos/dinero.png"> Dinero en mano:</div><br><div class="telefo1"><span style="color: #F4F4F4;">$</span> <?= moneyFormat(getPrincipalUserInformationById($connection, $userId, 'dinero')) ?></div>
						    </td>
						    <td style="width: 50%">
						        <div class="valors" style="color: black;"><img src="../imagenes/iconos/dineroenbanco.png"> Dinero en banco:</div><br><div class="valors1"><span style="color:black;">$</span> <?= moneyFormat(getPrincipalUserInformationById($connection, $userId, 'banco')) ?></div>
						    </td>
                        </tr>
                        <tr>
						    <td style="width: 50%">
						        <div class="valors" style="color: black;"><img src="../imagenes/iconos/monedap.png"> Moneda Real (GS):</div><br><div class="valors1"><span style="color:black;">$</span> <span style="color:#FFC900;"> <?= getPrincipalUserInformationById($connection, $userId, 'monedas') ?></span></div>
						    </td>
						    <td style="width: 50%">
						        <div class="valors" style="color: black;"><img src="../imagenes/iconos/celular.png"> Télefono:</div><br><div class="valors1"> <span style="color:#849EA5;"> <?= getUserInventory($connection, $userId, 'celular') ?></span></div>
						    </td>
						</tr>
                    </tbody>
				</table>
                    <div class="mensajealerta mazul" style="width:70%; text-align: center;" >
                        <b>Informacion adicional:</b><br>La informacion mostrada a todo publico es limitada, es decir; los datos como el dinero, las monedas premium, etc, solo el dueño puede verlos. Si el dueño del perfil elimina la restricción, podras ver todos sus datos.
                    </div>
                    <hr class="gs">
                    <div class="inventario" style="text-align:center; color: #F4F4F4;">Informacion General</div>
                    <hr class="gs">
                    <table style="width: 95%; text-align: center;" class="perf" border="0" cellpadding="2" cellspacing="2">
                        <tbody>
                            <tr style="text-align: center;">
                                <td class="estadi" style="width: 50%">
                                    <div class="estxt"><img src="../imagenes/iconos/respeto.png"> 
                                        Puntos de respeto: <span class="estxt2" style="color: #F4F4F4"> <?= getPrincipalUserInformationById($connection, $userId, 'experiencia'); ?></span>
                                    </div>
                                </td>
                                <td class="estadi" style="width: 50%">
						            <div class="estxt"><img src="../imagenes/iconos/hora.png"> Minutos Jugados: <span class="estxt2"> <?= getPrincipalUserInformationById($connection, $userId, 'minutos_juego') ?></span></div>
						        </td>
                            </tr>
                            <tr style="text-align: center;">
						        <td class="estadi" style="width: 50%">
						            <div class="estxt">
                                        <img src="../imagenes/iconos/fecha2.png"> Edad del PJ: <span class="estxt2"><?= getExtraUserInformation($connection, $userId, 'edad') ?> Años</span>
                                    </div>
						        </td>
                                <td class="estadi" style="width: 50%">
                                    <div class="estxt"><img src="../imagenes/iconos/rank2.png"> 
                                        Sexo: 
                                        <span class="estxt2">
                                            <?php 
                                                $sexo = getExtraUserInformation($connection, $userId, 'sexo');
                                                if($sexo == 1){
                                                    echo 'Masculino';
                                                } elseif($sexo == 2){
                                                    echo 'Femenino';
                                                } else {
                                                    echo 'Gay';
                                                }
                                            ?>
                                        </span>
                                    </div>
						        </td>
                            </tr>
                            <tr style="text-align: center;">';
						        <td class="estadi" style="width: 50%">
						            <div class="estxt"><img src="../imagenes/iconos/arrestado.png"> Veces arrestadas: <span class="estxt2">XXXXXXX</span></div>
						        </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="gs">
					<div class="inventario" style="text-align:center;">Tu mochila (Inven.)</div>
					<hr class="gs" style="text-align: center;">
                    <table style="width: 95%;" class="perf" border="0" cellpadding="2" cellspacing="2">
						<tbody>
					        <tr style="">
						        <td class="estadi" style="width: 50%">
						            <div class="estxt">
                                        <img src="../imagenes/iconos/piezas.png"> Piezas de armas: <span class="estxt2"> <?= getUserInventory($connection, $userId, 'piezas') ?> </span>
                                    </div>
						        </td>
						        <td class="estadi" style="width: 50%">';
						            <div class="estxt">
                                        <img src="../imagenes/iconos/crack.png"> Crack: <span class="estxt2"><?= getUserInventory($connection, $userId, 'crack') ?> g.</span>
                                    </div>
						        </td>
						    </tr>
						
		                    <tr style="">
		                        <td class="estadi" style="width: 50%">
						            <div class="estxt">
                                        <img src="../imagenes/iconos/medicamento.png"> Medicamento(s): <span class="estxt2"><?= getUserInventory($connection, $userId, 'medicamentos') ?> g.</span></div>
						        </td>
						        <td class="estadi" style="width: 50%">
						            <div class="estxt">
                                        <img src="../imagenes/iconos/gps.png"> GPS: 
                                        <span class="estxt2">
                                            XXXXXXXXXXXXX
						                </span>
                                    </div>
						        </td>
						    </tr>
                        </tbody>
                    </table>
                    <hr class="gs">
                    <div class="inventario" style="">Armamento</div>
					    <hr class="gs">
                        <table class="perf" style="width: 95%; text-align: center;" border="0" cellpadding="2" cellspacing="2">
						    <tbody>
						        <tr>
                                    <?php if(getExtraUserInformation($connection, $userId, 'estilo') == 0): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-0.gif" width="20" height="20"> Estilo de lucha:<br><span class="estxt2">  <b>No has aprendido ningún estilo</b></span></div></td>
                                    <?php elseif(getExtraUserInformation($connection, $userId, 'estilo') == 1): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-0.gif" width="20" height="20"> Estilo de lucha:<br><span class="estxt2">  <b>Estilo Codazo</b></span></div></td>
                                    <?php elseif(getExtraUserInformation($connection, $userId, 'estilo') == 2): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-0.gif" width="20" height="20"> Estilo de lucha:<br><span class="estxt2">  <b>Estilo KungFu</b></span></div></td>
                                    <?php elseif(getExtraUserInformation($connection, $userId, 'estilo') == 3): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-0.gif" width="20" height="20"> Estilo de lucha:<br><span class="estxt2">  <b>Estilo Callejero</b></span></div></td>
                                    <?php elseif(getExtraUserInformation($connection, $userId, 'estilo') == 4): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-0.gif" width="20" height="20"> Estilo de lucha:<br><span class="estxt2">  <b>Estilo Boxeador</b></span></div></td>
                                    <?php endif ?>
                                    
                                    <?php if(getUserInventory($connection, $userId, 'arma_2') == 0): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-21.gif" width="20" height="20"> Cuchillo:<br><span class="estxt2">  <b>No tienes un cuchillo</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_2') == 22): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-22.gif" width="20" height="20"> Pistola:<br><span class="estxt2">  <b>9mm</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_2') == 24): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-22.gif" width="20" height="20"> Pistola:<br><span class="estxt2">  <b>Desert Eagle</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_2') == 23): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-22.gif" width="20" height="20"> Pistola:<br><span class="estxt2">  <b>9mm Silenciada</b></span></div></td>
                                    <?php endif ?>
					            </tr>
						        <tr>
                                    <?php if(getUserInventory($connection, $userId, 'arma_3') == 0): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-27.gif" width="20" height="20"> Escopeta:<br><span class="estxt2">  <b>No tienes una escopeta</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_3') == 25): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-27.gif" width="20" height="20"> Escopeta:<br><span class="estxt2">  <b>Escopeta Normal</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_3') == 27): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-27.gif" width="20" height="20"> Escopeta:<br><span class="estxt2">  <b>Escopeta de Combate</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_3') == 33): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-27.gif" width="20" height="20"> Escopeta:<br><span class="estxt2">  <b>Rifle de Caza</b></span></div></td>
                                    <?php endif ?>

                                    <?php if(getUserInventory($connection, $userId, 'arma_4') == 0): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-28.gif" width="20" height="20"> Sub-Fusil:<br><span class="estxt2">  <b>No tienes un Sub-Fusil</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_4') == 28): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-28.gif" width="20" height="20"> Sub-Fusil:<br><span class="estxt2">  <b>Micro SMG/UZI</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_4') == 29): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-28.gif" width="20" height="20"> Sub-Fusil:<br><span class="estxt2">  <b>MP5</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_4') == 32): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-28.gif" width="20" height="20"> Sub-Fusil:<br><span class="estxt2">  <b>Tec-9</b></span></div></td>
                                    <?php endif ?>
						        </tr>
						        <tr>
                                    <?php if(getUserInventory($connection, $userId, 'arma_5') == 0): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-31.gif" width="20" height="20"> Fusil de Asalto:<br><span class="estxt2">  <b>No tienes un Fusil</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_5') == 31): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-31.gif" width="20" height="20"> Fusil de Asalto:<br><span class="estxt2">  <b>M4/M4a1</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_5') == 30): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-31.gif" width="20" height="20"> Fusil de Asalto:<br><span class="estxt2">  <b>Ak-47</b></span></div></td>
                                    <?php endif ?>
						        </tr>
						        <tr>
                                    <?php if(getUserInventory($connection, $userId, 'arma_1') == 0): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-32.gif" width="20" height="20"> Rifle de Francotirador:<br><span class="estxt2">  <b>No tienes un Rifle</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_1') == 4): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-32.gif" width="20" height="20"> Rifle de Francotirador:<br><span class="estxt2">  <b>Rifle de Francotirador</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_1') == 5): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-32.gif" width="20" height="20"> Rifle de Francotirador:<br><span class="estxt2">  <b>Rifle de Francotirador</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_1') == 3): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-32.gif" width="20" height="20"> Rifle de Francotirador:<br><span class="estxt2">  <b>Rifle de Francotirador</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_1') == 8): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-32.gif" width="20" height="20"> Rifle de Francotirador:<br><span class="estxt2">  <b>Rifle de Francotirador</b></span></div></td>
                                    <?php endif ?>

                                    <?php if(getUserInventory($connection, $userId, 'arma_10') == 0): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-51.gif" width="20" height="20"> Regalos:<br><span class="estxt2">  <b>No tienes ningún regalo</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_10') == 14): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-51.gif" width="20" height="20"> Regalos:<br><span class="estxt2">  <b>Flores</b></span></div></td>
                                    <?php elseif(getUserInventory($connection, $userId, 'arma_10') == 6): ?>
                                        <td class="estadi" style="width: 50%"><div class="estxt"><img src="../imagenes/iconos/armas/Weapon-51.gif" width="20" height="20"> Regalos:<br><span class="estxt2">  <b>Pala</b></span></div></td>
                                    <?php endif ?>
						        </tr>
			                </tbody>
						</table>
                </table>
            </div>
            <div class="fondoblancop">
                <div class="center" style="text-align: center;">
                    <h2>Ve tus vehiculos</h2>
                    <?php include 'verauto.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>