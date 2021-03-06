<?= $this->Html->css('profile.css') ?>
<?php foreach ($profile as $key => $p):?>
<div class="container main-secction">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                <img src="https://kenh14cdn.com/thumb_w/640/2019/photo1573869775258-1573869775595-crop-15738698553461099826581.jpg">
            </div>
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <img src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" class="rounded-circle">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <button id="btn-contact" (click)="clearModal()" data-toggle="modal" data-target="#contact" class="btn btn-success btn-block follow">Contactarme</button> 
                            <button class="btn btn-warning btn-block">Descargar Curriculum</button>                               
                        </div>
                        <div class="row user-detail-row">
                            <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                <div class="border"></div>
                                <p>FOLLOWER</p>
                                <span>320</span>
                            </div>                           
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                    <h1><?php echo $p->username ?></h1>
                                    <h5><?php
                                     	if ($p->level == 1) {echo "Admin";} 
                                     	if ($p->level == 2) {echo "Thủ thư";} 
                                     	if ($p->level == 3) {echo "Nhan viên";} 
                                    	?>
									</h5>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-6 profile-header-section1 text-right pull-rigth">
                                    <a href="/search" class="btn btn-primary btn-block">Seguir buscando</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                        <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                  <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> Perfil Profesional</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Información Detallada</a>
                                                </li>                                                
                                              </ul>
                                              
                                              <!-- Tab panes -->
                                              <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                        <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>ID</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $p->id; ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Fullname</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $p->fullname ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $p->email ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Phone</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $p->phone ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Level</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $p->level ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label>Adrress</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p><?php echo $p->address ?></p>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Experience</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>Expert</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Hourly Rate</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>10$/hr</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Total Projects</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>230</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>English Level</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>Expert</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>Availability</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p>6 months</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label>Your Bio</label>
                                                                    <br/>
                                                                    <p>Your detail description</p>
                                                                </div>
                                                            </div>
                                                </div>
                                                
                                              </div>
                          
                                </div>
                                <div class="col-md-4 img-main-rightPart">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row image-right-part">
                                                <div class="col-md-6 pull-left image-right-detail">
                                                    <h6>PUBLICIDAD</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="http://camaradecomerciozn.com/">
                                            <div class="col-md-12 image-right">
                                                <img src="https://www.saokim.com.vn/blog/wp-content/uploads/2010/10/logo-hinh-tron-saokim.png">
                                            </div>
                                        </a>
                                        <div class="col-md-12 image-right-detail-section2">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
    	    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'updateprofile', $p->id]); ?>" class="btn btn-primary" style="margin-top:50px;">Update profile</a>
    </div>
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contact">Contactarme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p for="msj">Se enviará este mensaje a la persona que desea contactar, indicando que te quieres comunicar con el. Para esto debes de ingresar tu información personal.</p>
                    </div>
                    <div class="form-group">
                        <label for="txtFullname">Nombre completo</label>
                        <input type="text" id="txtFullname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email</label>
                        <input type="text" id="txtEmail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="txtPhone">Teléfono</label>
                        <input type="text" id="txtPhone" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" (click)="openModal()" data-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>