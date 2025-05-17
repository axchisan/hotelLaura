<?php require_once 'views/includes/header.php'; ?>
<div class="container py-5">
    <h1 class="mb-4 animate__animated animate__fadeInDown">Contáctenos</h1>
    <div class="row">
        <div class="col-md-6 animate__animated animate__fadeInLeft">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">Ponte en Contacto</h3>
                    <p class="card-text">Nos encantaría saber de usted. Rellene el siguiente formulario y nos pondremos en contacto con usted lo antes posible.</p>
                    <form id="contactForm">
                        <div class="mb-3 input-group">
                            <span class="input-group-text icon-animate"><i class="fas fa-user"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Nombre" required>
                                <label for="name">Nombre</label>
                            </div>
                        </div>
                        <div class="mb-3 input-group">
                            <span class="input-group-text icon-animate"><i class="fas fa-envelope"></i></span>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Email" required>
                                <label for="email">Correo Electrónico</label>
                            </div>
                        </div>
                        <div class="mb-3 input-group">
                            <span class="input-group-text icon-animate"><i class="fas fa-comment"></i></span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" placeholder="Asunto" required>
                                <label for="subject">Asunto</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-scale"><i class="fas fa-paper-plane me-2"></i>Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 animate__animated animate__fadeInRight">
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-text">Ponte en contacto con nosotros:</p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-map-marker-alt me-2 icon-animate"></i>Km 7, Sector Porto Nao, Isla Barú, Cartagena de Indias, Colombia.</li>
                        <li class="mb-3"><i class="fas fa-phone me-2 icon-animate"></i>+57 3232293872</li>
                        <li class="mb-3"><i class="fas fa-envelope me-2 icon-animate"></i>privhotelplaya.com</li>
                    </ul>
                    <h4 class="mt-4">Horario de Atención</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-clock me-2"></i>Lunes-Viernes: 24 horas</li>
                        <li><i class="fas fa-clock me-2"></i>Sábado-Domingo: 24 horas</li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Nuestra Ubicación</h3>
                    <div class="ratio ratio-16x9 map-zoom">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.890004138437!2d-73.67045748899363!3d6.009838793950304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e41f06d1b94d193%3A0xd47ace7939d6dd68!2sSENA!5e0!3m2!1ses!2sco!4v1747452291039!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Gracias por tu mensaje, te responderemos pronto!');
    this.reset();
});
</script>
<?php require_once 'views/includes/footer.php'; ?>