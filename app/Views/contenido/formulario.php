<!-- Sección de Información de Contacto y Formulario -->
<div class="row">
  <!-- Información de la Empresa -->
  <div class="col-lg-4 mb-4 mb-lg-0">
    <div class="company-info p-4 bg-white rounded-3 shadow-sm" style="border-left: 4px solid #FF0033;">
      <h2 class="h3 mb-4" style="color: #1F2937; font-weight: 700;">Información de Contacto</h2>
      
      <div class="info-item mb-4">
        <h3 class="h5 mb-2" style="color: #FF0033; font-weight: 600;">Titular de la Empresa</h3>
        <p class="mb-0" style="color: #4B5563;">Juan Pérez González</p>
      </div>
      
      <div class="info-item mb-4">
        <h3 class="h5 mb-2" style="color: #FF0033; font-weight: 600;">Razón Social</h3>
        <p class="mb-0" style="color: #4B5563;">TECNOLOGÝA Y SOLUCIONES S.A.C.</p>
      </div>
      
      <div class="info-item mb-4">
        <h3 class="h5 mb-2" style="color: #FF0033; font-weight: 600;">Domicilio</h3>
        <p class="mb-0" style="color: #4B5563;">Sarmiento 177, El Colorado, Formosa, Argentina</p>
      </div>
      
      <div class="info-item mb-4">
        <h3 class="h5 mb-2" style="color: #FF0033; font-weight: 600;">Teléfonos</h3>
        <p class="mb-1" style="color: #4B5563;"><i class="fas fa-phone-alt me-2" style="color: #FF0033;"></i> +54 123 4567</p>
        <p class="mb-0" style="color: #4B5563;"><i class="fas fa-mobile-alt me-2" style="color: #FF0033;"></i> +54 987 6543</p>
      </div>
      
      <div class="info-item mb-4">
        <h3 class="h5 mb-2" style="color: #FF0033; font-weight: 600;">Correo Electrónico</h3>
        <p class="mb-0" style="color: #4B5563;"><i class="fas fa-envelope me-2" style="color: #FF0033;"></i> centro_informatico_regional@gmail.com</p>
      </div>
      
      <div class="info-item">
        <h3 class="h5 mb-2" style="color: #FF0033; font-weight: 600;">Horario de Atención</h3>
        <p class="mb-1" style="color: #4B5563;"><i class="fas fa-clock me-2" style="color: #FF0033;"></i> Lunes a Viernes: 9:00 AM - 6:00 PM</p>
        <p class="mb-0" style="color: #4B5563;"><i class="fas fa-clock me-2" style="color: #FF0033;"></i> Sábados: 9:00 AM - 1:00 PM</p>
      </div>
    </div>
  </div>
  
  <!-- Formulario de Contacto -->
  <div class="col-lg-8">
    <div class="contact-form p-4 bg-white rounded-3 shadow-sm">
      <h2 class="h3 mb-4" style="color: #1F2937; font-weight: 700;">Contáctanos</h2>
      <p class="mb-4" style="color: #4B5563;">Complete el siguiente formulario y nos pondremos en contacto con usted a la brevedad.</p>
      
      <form action="<?= base_url('contacto/enviar') ?>" method="post">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label" style="color: #1F2937; font-weight: 500;">Nombre Completo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label" style="color: #1F2937; font-weight: 500;">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="telefono" class="form-label" style="color: #1F2937; font-weight: 500;">Teléfono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="asunto" class="form-label" style="color: #1F2937; font-weight: 500;">Asunto</label>
            <select class="form-select" id="asunto" name="asunto" required>
              <option value="" selected disabled>Seleccione una opción</option>
              <option value="consulta">Consulta General</option>
              <option value="servicio">Solicitud de Servicio</option>
              <option value="reclamo">Reclamo</option>
              <option value="sugerencia">Sugerencia</option>
              <option value="otro">Otro</option>
            </select>
          </div>
        </div>
        
        <div class="mb-3">
          <label for="mensaje" class="form-label" style="color: #1F2937; font-weight: 500;">Mensaje</label>
          <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
        </div>
        
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="privacidad" name="privacidad" required>
          <label class="form-check-label" for="privacidad" style="color: #4B5563; font-size: 0.9rem;">
            Acepto que mis datos sean tratados según la política de privacidad.
          </label>
        </div>
        
        <button type="submit" class="btn" style="background-color: #FF0033; color: white; border: none; padding: 0.8rem 2rem; border-radius: 50px; font-weight: 500;">
          Enviar Mensaje
          <i class="fas fa-paper-plane ms-2"></i>
        </button>
      </form>
    </div>
  </div>
</div> 