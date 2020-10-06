
<!-- Modal -->
<div class="modal fade" id="insertarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="insertarcontenido" onsubmit="return insertarDatos()" method="POST">
              <label>Nombre Completo</label>
              <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control form-control-sm sl-espacios" required="" maxlength="60">
              <label>Correo</label>
              <input type="email" id="correo_usuario" name="correo_usuario" class="form-control form-control-sm" required="">
              <label>Cedula</label>
              <input type="text" id="cedula_usuario" name="cedula_usuario" class="form-control form-control-sm sl-numeros" maxlength="10" minlength="10" required="">
              <label>Contraseña</label>
              <input type="password" id="clave_usuario" name="clave_usuario" class="form-control form-control-sm" maxlength="12" minlength="5" required="">
              <label>Tipos de Usuario</label>
              <select id="idrol" name="idrol"  class="form-control form-control-sm"> 
                <option value="1">1- ADMINISTRADOR</option>
                <option value="2">2- INSPECTOR</option>
                </select>
              <br>
               <input type="submit" value="Guardar" class="btn btn-primary">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="botoncerrar">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>


<!-- 4 -->