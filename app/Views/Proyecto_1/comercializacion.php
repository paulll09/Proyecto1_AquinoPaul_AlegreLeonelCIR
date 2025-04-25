<?= $this->extend('plantillas/base') ?>

<?= $this->section('contenido') ?>
<!-- Sección de Comercialización -->
<section class="comercializacion-hero py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="display-4 fw-bold" style="color: #1F2937;">Información Comercial</h1>
                <p class="lead" style="color: #4B5563;">Conoce nuestras formas de pago y requisitos para comprar</p>
            </div>
        </div>
    </div>
</section>

<!-- Sección Formas de Pago -->
<section class="formas-pago py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h3 fw-bold mb-4" style="color: #1F2937;">
                            <i class="fas fa-credit-card me-2" style="color: #FF0033;"></i>
                            Formas de pago
                        </h2>
                        <p class="lead mb-4" style="color: #4B5563;">Para tu comodidad, disponemos de múltiples formas de pago:</p>
                        
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-3">
                                <div class="payment-option p-3 bg-light rounded-3 h-100">
                                    <i class="fas fa-home fa-2x mb-3" style="color: #FF0033;"></i>
                                    <h3 class="h5 fw-bold" style="color: #1F2937;">Crédito de la casa</h3>
                                    <p class="mb-0" style="color: #4B5563;">Te ofrecemos un plan accesible y personalizado para que puedas realizar tus compras.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="payment-option p-3 bg-light rounded-3 h-100">
                                    <i class="fas fa-credit-card fa-2x mb-3" style="color: #FF0033;"></i>
                                    <h3 class="h5 fw-bold" style="color: #1F2937;">Tarjetas</h3>
                                    <p class="mb-0" style="color: #4B5563;">Aceptamos una amplia gama de tarjetas de crédito y débito para facilitar tus transacciones.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="payment-option p-3 bg-light rounded-3 h-100">
                                    <i class="fas fa-university fa-2x mb-3" style="color: #FF0033;"></i>
                                    <h3 class="h5 fw-bold" style="color: #1F2937;">Transferencias</h3>
                                    <p class="mb-0" style="color: #4B5563;">Puedes optar por realizar transferencias seguras desde tu banco.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="payment-option p-3 bg-light rounded-3 h-100">
                                    <i class="fas fa-money-bill-wave fa-2x mb-3" style="color: #FF0033;"></i>
                                    <h3 class="h5 fw-bold" style="color: #1F2937;">Efectivo</h3>
                                    <p class="mb-0" style="color: #4B5563;">Ideal para aquellos que prefieren un método tradicional.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sección Información para el Cliente -->
<section class="info-cliente py-5" style="background-color: #F5F5F5;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h3 fw-bold mb-4" style="color: #1F2937;">
                            <i class="fas fa-info-circle me-2" style="color: #FF0033;"></i>
                            Información para el cliente
                        </h2>
                        <p class="lead mb-4" style="color: #4B5563;">Para realizar compras en nuestra tienda, es necesario cumplir con los siguientes requisitos:</p>
                        
                        <div class="requirements-list">
                            <div class="requirement-item d-flex align-items-start mb-3">
                                <i class="fas fa-check-circle mt-1 me-3" style="color: #FF0033;"></i>
                                <p class="mb-0" style="color: #4B5563;">Contar con un documento de identidad válido.</p>
                            </div>
                            <div class="requirement-item d-flex align-items-start mb-3">
                                <i class="fas fa-check-circle mt-1 me-3" style="color: #FF0033;"></i>
                                <p class="mb-0" style="color: #4B5563;">Proporcionar una dirección de envío precisa y completa.</p>
                            </div>
                            <div class="requirement-item d-flex align-items-start mb-3">
                                <i class="fas fa-check-circle mt-1 me-3" style="color: #FF0033;"></i>
                                <p class="mb-0" style="color: #4B5563;">Aceptar nuestros términos y condiciones de compra.</p>
                            </div>
                            <div class="requirement-item d-flex align-items-start mb-4">
                                <i class="fas fa-check-circle mt-1 me-3" style="color: #FF0033;"></i>
                                <p class="mb-0" style="color: #4B5563;">Si elige la opción de crédito de la casa, presentar la documentación requerida para la aprobación del crédito.</p>
                            </div>
                        </div>

                        <div class="alert alert-info d-flex align-items-center mt-4" role="alert">
                            <i class="fas fa-headset me-3 fa-2x"></i>
                            <div>
                                <p class="mb-0">Nuestro equipo de atención al cliente está disponible para resolver cualquier duda o consulta que tengas, garantizando que tu experiencia de compra sea rápida y sencilla.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- Procedimientos de Venta -->
  <div class="terms-content">
            <div class="terms-section-title">
                <h2>Procedimientos de Venta</h2>
                <div class="title-decoration"></div>
            </div>
            <div class="terms-grid">
                <!-- Garant�as -->
                <div class="terms-card">
                    <div class="terms-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Garant�as</h3>
                    <p>Todos nuestros productos cuentan con garant�a de f�brica. El per�odo de garant�a var�a seg�n el producto y el fabricante.</p>
                </div>

                <!-- Soporte Postventa -->
                <div class="terms-card">
                    <div class="terms-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Soporte Postventa</h3>
                    <p>Ofrecemos soporte t�cnico especializado para todos nuestros productos. Nuestro equipo est� disponible para asistirlo en cualquier consulta.</p>
                </div>

                <!-- Entregas -->
                <div class="terms-card">
                    <div class="terms-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Entregas</h3>
                    <p>Realizamos entregas en toda la provincia de Formosa y parte del Chaco. Los tiempos de entrega var�an seg�n la ubicaci�n.</p>
                </div>

                <!-- Tiempos -->
                <div class="terms-card">
                    <div class="terms-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Tiempos</h3>
                    <p>Los tiempos de entrega estimados son de 24 a 48 horas h�biles para productos en stock. Para productos especiales, consultar disponibilidad.</p>
                </div>
            </div>
        </div>


<!-- Sección de Contacto Rápido -->
<?= $this->include('contenido/contactoRapido') ?>

<!-- Sección de Ubicación -->
<?= $this->include('contenido/ubicacion') ?>
<?= $this->endSection() ?>

<?= $this->section('scripts_adicionales') ?>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<?= $this->endSection() ?>
