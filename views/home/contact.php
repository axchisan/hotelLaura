<?php require_once 'views/includes/header.php'; ?>

<div class="container py-5">
    <h1 class="mb-4">Contáctenos</h1>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">Ponte en contacto</h3>
                    <p class="card-text">Nos encantaría saber de usted. Rellene el siguiente formulario y nos pondremos en contacto con usted lo antes posible.</p>
                    
                    <form id="contactForm">
                        <div class="mb-3">
                            <label for="name" class="form-label"> Nombre</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="subject" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <p class="card-text">Ponte en contacto con nosotros:</p>
                    
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i>  Km 7, Sector Porto Nao, Isla Barú, Cartagena de Indias, Colombia.
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone me-2"></i> +57 3232293872
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope me-2"></i> privhotelplaya.com
                        </li>
                    </ul>
                    
                    <h4 class="mt-4">Horas de Trabajo</h4>
                    <ul class="list-unstyled">
                        <li>Lunes-Viernes: 24 hours</li>
                        <li>Sábado-Domingo: 24 hours</li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Nuestra Dirección</h3>
                    <div class="ratio ratio-16x9">
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

