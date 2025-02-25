<div class="container-fluid text-center mt-4 container-image" >
        <div class="row m-0">
            <div class="col-lg-2 col-sm-12">
                <div class="border mt-3 rounded">
                    <div class="">
                        <h5 class="text-center border text-black m-0 p-1"><?= $userData['nombre']; ?></h5>
                        <img src="<?= '../imagenes/skins/' . $principalUserData['skin'] . '.png' ?>" alt="Avatar" class="profile-img rounded">
                    </div>
                </div>
                <div class="btn w-100 border mt-2">
                    <i class="fa-solid fa-gear"></i>
                    <a href="#" class="text-black text-decoration-none">Configuración de cuenta</a>
                </div>
                <div class="btn w-100 border mt-2">
                    <i class="fas fa-trophy"></i>
                    <a href="#" class="text-black text-decoration-none">Resumen y logros</a>
                </div>
                <div class="card-money">
                    <span class="text-black">💰 Moneda GS</span>
                    <span class="badge bg-warning"> <?= $principalUserData['monedas']; ?></span>
                </div>
                <div class="card-money">
                    <span class="text-black">💵 Dinero</span>
                    <span class="badge bg-success">$ <?= $principalUserData['dinero']; ?></span>
                </div>
                <div class="card-money">
                    <span class="text-black">🏦 Banco</span>
                    <span class="badge bg-primary">$ <?= $principalUserData['banco']; ?></span>
                </div>
            </div>
            <div class="col-lg-10 col-sm-12 mt-3">
                <div class="row d-flex justify-content-between mb-2">
                    <div class="col-sm-12 col-lg-3 pb-2">
                        <div class="card">
                            <a class="btn btn-perfil" href="">Información</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 pb-2">
                        <div class="card">
                            <a class="btn btn-perfil" href="paginator.php">Vehiculos</a>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 pb-2">
                        <div class="card">
                            <a class="btn btn-perfil" href="">Información</a>
                        </div>        
                    </div>
                    <div class="col-sm-12 col-lg-3 pb-2">
                        <div class="card">
                            <a class="btn btn-perfil" href="">Información</a>
                        </div>        
                    </div>
                </div>
                <div class="container border shadow rounded">
                <div class="row mt-3 d-flex ">
                    <h3 class="mb-4 col-sm-12 col-lg-12 mt-2">Información de tu cuenta</h3>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-sm-12">
                        <div class="d-flex flex-column">
                            <table class="table table-bordered rounded shadow-sm">
                                <tbody>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">🗿 Nombre:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $userData['nombre']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1" >📅 Edad:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $extraUserData['edad']; ?> años</strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">⭐ Nivel:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $principalUserData['nivel']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">📈 Experiencia:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $principalUserData['experiencia']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">⚠️ Sanciones:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $extraUserData['jails']; ?></strong></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <table class="table table-bordered shadow-sm">
                            <tbody>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">🕒 Ultima conexión</p>
                                        <p class="m-0 p-1 pe-2"><strong><?= date('d-m-Y H:i',$userData['ultima_conexion']); ?></strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">📱 Teléfono:</p>
                                        <p class="m-0 p-1 pe-2"><strong><?= $inventory['celular']; ?></strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">❤️ Salud:</p>
                                        <p class="m-0 p-1 pe-2"><strong><?= $principalUserData['vida']; ?></strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">🛡️ Chaleco:</p>
                                        <p class="m-0 p-1 pe-2"><strong><?= $principalUserData['chaleco']; ?></strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" p-0 d-flex justify-content-between text-center">
                                        <p class="m-0 p-1">👕 Skin:</p>
                                        <p class="m-0 p-1 pe-2"><strong><?= $principalUserData['skin']; ?></strong></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-1 d-flex">
                    <h3 class="mb-4 col-sm-12 col-lg-12 mt-2">Inventario</h3>
                </div>
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-6 col-sm-12">
                        <div class="d-flex flex-column">
                            <table class="table table-bordered shadow-sm">
                                <tbody>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">💊 Medicamentos:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $inventory['medicamentos']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">🌿 Marihuana:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $inventory['crack']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">⚙️ Piezas:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $inventory['piezas']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">📦 Materiales:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $inventory['materiales']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">💉 Botiquines:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $inventory['botiquines']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">🌱 Semillas:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= $inventory['semillas']; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">🎙️ Radio:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= ($inventory['radio'] == 0) ? 'No':'Si'; ?></strong></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" p-0 d-flex justify-content-between text-center">
                                            <p class="m-0 p-1">🪛 Destornillador:</p>
                                            <p class="m-0 p-1 pe-2"><strong><?= ($inventory['destornillador']) == 0 ? 'No':'Si'; ?></strong></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="d-flex flex-column">
                                <table class="table table-bordered shadow-sm">
                                    <tbody>
                                        <tr>
                                            <td class=" p-0 d-flex justify-content-between text-center">
                                                <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-4.gif" alt=""> Arma blanca:</p>
                                                <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class=" p-0 d-flex justify-content-between text-center">
                                                <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-24.gif" alt=""> Pistola:</p>
                                                <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class=" p-0 d-flex justify-content-between text-center">
                                                <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-27.gif" alt=""> Escopeta:</p>
                                                <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class=" p-0 d-flex justify-content-between text-center">
                                                <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-29.gif" alt=""> Subfusil:</p>
                                                <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class=" p-0 d-flex justify-content-between text-center">
                                                <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-31.gif" alt=""> Fusil de asalto:</p>
                                                <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class=" p-0 d-flex justify-content-between text-center">
                                                <p class="m-0 p-1"><img src="..\imagenes\iconos\armas\Weapon-33.gif" alt=""> Rifle:</p>
                                                <p class="m-0 p-1 pe-2"><strong>3800</strong></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    </div