<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="inicio.php" class="site_title"><img src="../img/Univo-logo.png" style="height: 50px; width: 45px;"> <span>Veterinaria Univo</span></a>
        </div>

        <div class="clearfix"></div>
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="../img/user_admin.png" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <span>Bienvenido</span>
            <h2>Administrador</h2>
            <h5>Clinica Veterinaria Univo</h5>
          </div>
        </div>
        <br/>

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>Menu</h3>
            <ul class="nav side-menu">
              <li>
                <a href="../home/">
                  <i class="fa fa-home"></i>
                  <b> Inicio</b>
                </a>
              </li>

              <li>
                <a>
                  <i class="fa fa-user"></i>
                  <b> Usuario </b>
                  <span class="fa fa-chevron-right"></span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a href="../usuario/NuevoUsuario.php">
                      <i class="fa fa-plus"></i>
                      <b> Nuevo Usuario</b>
                    </a>
                  </li>

                  <li>
                    <a href="../usuario/ListadoUsuarios.php?q=">
                      <i class="fa fa-list"></i>
                      <b> Listado de Usuarios</b>
                    </a>
                  </li>
                </ul>
              </li>

              <li>
                <a>
                  <i class="fa fa-users"></i>
                  <b> Contactos </b>
                  <span class="fa fa-chevron-right"></span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a>
                      <i class="fa  fa-user-secret"></i>
                      <b> Proveedor </b>
                      <span class="fa fa-chevron-right"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li class="sub_menu">
                        <a href="../proveedor/NuevoProveedor.php">
                          <i class="fa fa-plus"></i>
                          <b> Nuevo Proveedor</b>
                        </a>
                      </li>
                      <li>
                        <a href="../proveedor/ListadoProveedores.php?q=">
                          <i class="fa fa-list"></i>
                          <b> Listado de Proveedores</b>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li>
                    <a>
                      <i class="fa fa-hospital-o"></i>
                      <b> Laboratorio </b>
                      <span class="fa fa-chevron-right"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li class="sub_menu">
                        <a href="../laboratorio/NuevoLaboratorio.php">
                          <i class="fa fa-plus"></i>
                          <b> Nuevo Laboratorio</b>
                        </a>
                      </li>
                      <li>
                        <a href="../laboratorio/ListadoLaboratorio.php?q=">
                          <i class="fa fa-list"></i>
                          <b> Listado de Laboratorios</b>
                        </a>
                      </li>
                    </ul>
                  </li>

                </ul>
              </li>


              <li>
                <a>
                  <i class="fa fa-users"></i>
                  <b> Clientes </b>
                  <span class="fa fa-chevron-right"></span>
                </a>
                <ul class="nav child_menu">

                   <li>
                    <a>
                      <i class="fa fa-paw"></i>
                      <b> Mascota </b>
                      <span class="fa fa-chevron-right"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="../mascota/NuevaMascota.php">
                          <i class="fa fa-plus"></i>
                          <b> Nueva Mascota</b>
                        </a>
                      </li>

                      <li>
                        <a href="../mascota/ListadoMascota.php?q=">
                          <i class="fa fa-list"></i>
                          <b> Listado de Mascotas</b>
                        </a>
                      </li>
                    </ul>
                  </li>


                  <li>
                <a>
                  <i class="fa fa-male"></i>
                  <b> Cliente </b>
                  <span class="fa fa-chevron-right"></span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a href="../cliente/NuevoCliente.php">
                      <i class="fa fa-plus"></i>
                      <b> Nuevo Cliente</b>
                    </a>
                  </li>
                  <li>
                    <a href="../cliente/ListadoCliente.php?q=">
                      <i class="fa fa-list"></i>
                      <b> Listado de Clientes</b>
                    </a>
                  </li>
                </ul>
              </li>

                 

                </ul>
              </li>

               <li>
                <a>
                  <i class="fa fa-folder"></i>
                  <b> Expediente </b>
                  <span class="fa fa-chevron-right"></span>
                </a>
                <ul class="nav child_menu">
                  <li>
                  <a>
                    <i class="fa fa-user-md"></i>
                    <b> Consultas </b>
                    <span class="fa fa-chevron-right"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="../consulta/RegistrarConsulta.php">
                        <i class="fa fa-plus"></i>
                        <b> Nuevo Consulta</b>
                      </a>
                    </li>
                    <li>
                      <a href="../consulta/ListadoConsultas.php?q=">
                        <i class="fa fa-list"></i>
                        <b> Listado de Consultas</b>
                      </a>
                    </li>
                  </ul>
                </li>

                  <li>
                  <a>
                    <i class="fa fa-heartbeat"></i>
                    <b> Examen </b>
                    <span class="fa fa-chevron-right"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="../examen/RegistrarExamen.php">
                        <i class="fa fa-plus"></i>
                        <b> Nuevo Examen</b>
                      </a>
                    </li>
                    <li>
                      <a href="../examen/ListadoExamenes.php?q=">
                        <i class="fa fa-list"></i>
                        <b> Listado de Examenes</b>
                      </a>
                    </li>
                  </ul>
                </li>

                 <li>
                  <a>
                    <i class="fa fa-shopping-bag"></i>
                    <b> Servicios </b>
                    <span class="fa fa-chevron-right"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="../servicio/NuevoServicio.php">
                        <i class="fa fa-plus"></i>
                        <b> Nuevo Servicio</b>
                      </a>
                    </li>
                    <li>
                      <a href="../servicio/ListadoServicios.php?q=">
                        <i class="fa fa-list"></i>
                        <b> Listado de Servicios</b>
                      </a>
                    </li>
                  </ul>
                </li>


                </ul>
              </li>
                

               

                  <li>
                    <a>
                      <i class="fa fa-shopping-basket"></i>
                      <b> Insumos </b>
                      <span class="fa fa-chevron-right"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li>
                        <a>
                          <i class="fa fa-stethoscope"></i>
                          <b> Producto Medicinal </b>
                          <span class="fa fa-chevron-right"></span>
                        </a>
                        <ul class="nav child_menu">
                          <li class="sub_menu">
                            <a href="../productoMedicinal/NuevoProductoMedicinal.php">
                              <i class="fa fa-plus"></i>
                              <b> Nuevo Producto</b>
                            </a>
                          </li>
                          <li>
                            <a href="../productoMedicinal/ListadoProductoMedicinal.php?q=">
                              <i class="fa fa-list"></i>
                              <b> Listado de Productos</b>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li>
                        <a>
                          <i class="fa fa-dashboard"></i>
                          <b> Materiales </b>
                          <span class="fa fa-chevron-right"></span>
                        </a>
                        <ul class="nav child_menu">
                          <li class="sub_menu">
                            <a href="../material/NuevoMaterial.php">
                              <i class="fa fa-plus"></i>
                              <b> Nuevo Material</b>
                            </a>
                          </li>
                          <li>
                            <a href="../material/ListadoMateriales.php?q=">
                              <i class="fa fa-list"></i>
                              <b> Listado de Materiales</b>
                            </a>
                          </li>
                        </ul>
                      </li>
                       <li>
                  <a>
                    <i class="fa fa-medkit"></i>
                    <b> Botiquín </b>
                    <span class="fa fa-chevron-right"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="../botiquin/RegistrarBotiquin.php">
                        <i class="fa fa-plus"></i>
                        <b> Nuevo Medicamento</b>
                      </a>
                      </li>
                      <li>
                        <a href="../botiquin/ListadoBotiquin.php">
                          <i class="fa fa-list"></i>
                          <b> Listado de Medicamentos</b>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li>
                    <a>
                      <i class="fa fa-ambulance"></i>
                      <b> Equipos </b>
                      <span class="fa fa-chevron-right"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li class="sub_menu">
                        <a href="../equipo/NuevoEquipo.php">
                          <i class="fa fa-plus"></i>
                          <b> Nuevo Equipo</b>
                        </a>
                      </li>
                      <li>
                        <a href="../equipo/ListadoEquipo.php?q=">
                          <i class="fa fa-list"></i>
                          <b> Listado de Equipos</b>
                        </a>
                      </li>
                    </ul>
                  </li>
                    </ul>
                  </li>

                  <li>
                    <a>
                      <i class="fa fa-money"></i>
                      <b> Ventas </b>
                      <span class="fa fa-chevron-right"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="../venta/RegistrarVenta.php">
                          <i class="fa fa-plus"></i>
                          <b> Nueva Venta</b>
                        </a>
                      </li>
                      <li>
                        <a href="../venta/ListadoVentas.php">
                          <i class="fa fa-list"></i>
                          <b> Listado de Ventas</b>
                        </a>
                      </li>
                    </ul>
                  </li>

                  <li>
                    <a>
                      <i class="fa fa-cubes"></i>
                      <b> Inventario </b>
                      <span class="fa fa-chevron-right"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-medkit"></i>
                          <b> Inventario de Botiquín</b>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-eyedropper"></i>
                          <b> Inventario de Medicamentos</b>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-ambulance"></i>
                          <b> Inventario de Equipo</b>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-dashboard"></i>
                          <b> Inventario de Productos</b>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a>
                      <i class="fa fa-file-pdf-o"></i>
                      <b>  Reportes </b>
                      <span class="fa fa-chevron-right"></span>
                    </a>
                      <ul class="nav child_menu">
                        <li>
                          <a href="../ReporteUsuarios.php" >
                            <i class="fa fa-user"></i>
                            <b>Reporte de Usuarios</b>
                          </a>
                        </li>
                        <li>
                          <a href="#" >
                            <i class="fa fa-money"></i>
                            <b>Reporte de Ventas</b>
                          </a>
                        </li>
                        <li>
                          <a href="#" >
                            <i class="fa fa-line-chart"></i>
                            <b>Reporte de Existencias</b>
                          </a>
                        </li>
                        <li>
                          <a href="#" >
                            <i class="fa fa-briefcase"></i>
                            <b>Resporte de Producto Vencido</b>
                          </a>
                        </li>
                        <li>
                          <a href="../reportes/ReporteConsultas.php" >
                           <i class="fa fa-user-md"></i>
                            <b>Reporte de Consultas</b>
                          </a>
                        </li>
                        <li>
                          <a href="../reportes/ReporteServicios.php" >
                           <i class="fa fa-shopping-bag"></i>
                            <b>Reporte de Servicios</b>
                          </a>
                        </li>
                        <li>
                          <a href="../reportes/ReporteExamen.php" >
                           <i class="fa fa-heartbeat"></i>
                            <b>Reporte de Examenes</b>
                          </a>
                        </li>
                        <li>
                          <a href="#" >
                           <i class="fa fa-dashboard"></i>
                            <b>Reporte de Materiales</b>
                          </a>
                        </li>
                        <li>
                          <a href="#" >
                           <i class="fa fa-medkit"></i>
                            <b>Reporte Medicinal</b>
                          </a>
                        </li>
                        <li>
                          <a href="#" >
                           <i class="fa fa-medkit"></i>
                            <b>Reporte de Botiquín</b>
                          </a>
                        </li>
                        <li>
                          <a href="#" >
                           <i class="fa fa-pie-chart"></i>
                            <b>Reporte General</b>
                          </a>
                        </li>

                      </ul>
                    </li>

                    <li>
                      <a>
                        <i class="fa fa-book"></i>
                        <b> Manuales </b>
                        <span class="fa fa-chevron-right"></span>
                      </a>
                      <ul class="nav child_menu">
                      <li>
                          <a href="../manual/ManualUsuario.php">
                            <i class="fa fa-user"></i>
                            <b> Manual de usuario </b>
                          </a>
                        </li>

                        <li>
                          <a href="#">
                            <i class="fa fa-cogs"></i>
                            <b> Manual de instalación </b>
                          </a>
                        </li>
                      </ul>
                    </li>

                    <li>
                      <a>
                        <i class="fa fa-cog"></i>
                        <b> Configuración </b>
                        <span class="fa fa-chevron-right"></span>
                      </a>
                      <ul class="nav child_menu">
                        <li>
                          <a href="../backup/backup.php">
                            <i class="fa fa-database"></i>
                            <b> Respaldo de Datos </b>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
