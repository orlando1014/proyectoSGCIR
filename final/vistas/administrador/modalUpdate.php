<!-- Modal -->
<div class="modal fade" id="actualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="insertarcontenidoA" onsubmit="return actualizarDatos()" method="POST">
            <input type="text" id="idusuario" name="idusuario" hidden="">
            <label>Nombre Completo</label>
              <input type="text" id="nombre_usuarioA" name="nombre_usuarioA" class="form-control form-control-sm" required="">
              <label>Correo</label>
              <input type="text" id="correo_usuarioA" name="correo_usuarioA" class="form-control form-control-sm" required="">
              <label>Cedula</label>
              <input type="text" id="cedula_usuarioA" name="cedula_usuarioA" class="form-control form-control-sm">
              <!-- <label>Contraseña</label>
              <input type="text" id="clave_usuarioA" name="clave_usuarioA" class="form-control form-control-sm"> -->
              <label>Tipos de Usuario</label>
              <select id="idrolA" name="idrolA"  class="form-control form-control-sm"> 
        <option value="1">1- ADMINISTRADOR</option>
        <option value="2">2- INSPECTOR</option>
        </select>
              <br>               <input type="submit" value="Actualizar" class="btn btn-warning">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="botonActualizar">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
