<!-- Modal -->
<div class="modal fade" id="modalHistorialControlParental" tabindex="-1" role="dialog" aria-labelledby="modalHistorialControlParentalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHistorialControlParentalLabel">Historial Control Parenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <label for="modal_cp_fecha">Fecha atendida:</label>
                <input class="form-control" type="text" id="modal_cp_fecha" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="modal_cp_edad_gestacional">Edad Gestacional:</label>
                <input class="form-control" type="text" id="modal_cp_edad_gestacional" disabled />
            </div>
            <div class="col-md-3">
                <label for="modal_cp_presion_arterial">Presión arterial (mm/hg):</label>
                <input class="form-control" type="text" id="modal_cp_presion_arterial" disabled/>
            </div>
            <div class="col-md-3">
                <label for="modal_cp_altura_uterina">Altura uterina:</label>
                <input class="form-control" type="text" id="modal_cp_altura_uterina" disabled/>
            </div>
            <div class="col-md-3">
                <label for="modal_cp_presentacion">Preentación:</label>
                <input class="form-control" type="text" id="modal_cp_presentacion" disabled/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="modal_cp_fcf">FCF:</label>
                <input class="form-control" type="text" id="modal_cp_fcf" disabled/>
            </div>
            <div class="col-md-3">
                <label for="modal_cp_peso">Peso:</label>
                <input class="form-control" type="text" id="modal_cp_peso" disabled/>
            </div>
            <div class="col-md-3">
                <label for="modal_cp_ultrasonido">Ultrasonido:</label>
                <input class="form-control" type="text" id="modal_cp_ultrasonido" disabled/>
            </div>
            <div class="col-md-3">
                <label for="modal_cp_vacunas">Vacunas:</label>
                <input class="form-control" type="text" id="modal_cp_vacunas" disabled/>
            </div>
        </div>
      </div>
      <div class="row">
          <div class="col-2">
              <button class="btn btn-primary" id="btn_control_parental_anterior" type="button" onclick="verControlParentalAnterior()">Ver anterior</button>
          </div>
          <div class="col-2" style="text-align: center;">
             <br />
              <p style="font-weight: bolder;"><em id="em_indice_actual">0</em> de <em id="em_total">0</em></p>
          </div>
          <div class="col-2">
              <button class="btn btn-primary" id="btn_control_parental_siguiente" type="button" onclick="verControlParentalSiguiente()">Ver siguiente</button>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        {{-- <button type="button" class="btn btn-primary"></button> --}}
      </div>
    </div>
  </div>
</div>
