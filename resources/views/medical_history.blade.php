
@extends("$theme/layout")
@section('title')
Historial Clínico
@endsection
@section('styles_page_vendors')
<link href="{{ asset("assets/$theme") }}/vendors/general/bootstrap-select/dist/css/bootstrap-select.css"
    rel="stylesheet" type="text/css">
<link href="{{ asset("assets/$theme") }}/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset("assets/$theme") }}/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
@endsection
@section('styles_optional_vendors')
@endsection

@section('content_breadcrumbs')
{!! PilatesHelper::getBreadCrumbs([['route' => route('medical_history'), 'name' => 'Historial Clínico']]) !!}
@endsection

@section('content_page')
<div class="row p-0 m-0">
    {{-- table clients --}}
    <div class="col-xs-12 col-lg-5">
        {{-- table clients --}}

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand  fa fa-inbox"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Clientes
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i> Acciones
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Elige una opción</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" onclick="compressByClients()" id="btn-delete-rooms"
                                                class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon-download-1"></i>
                                                <span class="kt-nav__link-text">Descargar seleccionados</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            &nbsp;
                            <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" onclick="compressAll()">
                                <i class="kt-nav__link-icon flaticon-download-1"></i>
                                Descargar Todo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body w-100 ">
                <div class="container">
                    <button type="button" class="btn btn-sm btn-primary btn-brand--icon my-2"
                        onclick="showHiddenFields('kt_table_clients',this)">Ver campos protegidos</button>
                    <!--begin: Datatable -->

                    <table class="table-bordered table-hover table-data-custom" style="display:none"
                        id="kt_table_clients">
                        <thead>
                            <tr>
                                <th class="clean-icon-table">
                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                                        <input type="checkbox" name="select_all" value="1" id="select-all-clients">
                                        <span></span>
                                    </label>
                                </th>
                                <th>Apellidos</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Nivel</th>
                                <th>Sexo</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Dirección</th>
                                <th>Dni</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Fecha de Registro</th>
                                <th>Observaciones</th>
                                <th>Saldo Pilates Máquina</th>
                                <th>Saldo Pilates Suelo</th>
                                <th>Saldo Fisioterapia</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!--end: Datatable -->
            </div>
        </div>

        {{-- end table clients --}}
    </div>
    {{-- end table clients --}}

    {{-- start table groups --}}
    <div class="col-xs-12 col-lg-7">

        {{-- table clients --}}

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand  fa fa-inbox"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Registros
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i> Acciones
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Elige una opción</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" onclick="addDocumentClient()" class="kt-nav__link"
                                                data-toggle="modal" data-target="#modal_add_client">
                                                <i class="kt-nav__link-icon flaticon2-add-circular-button"></i>
                                                <span class="kt-nav__link-text">Agregar Registro</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" onclick="editDocumentClient()" class="kt-nav__link"
                                                data-toggle="modal" data-target="#modal_edit_document_client">
                                                <i class="kt-nav__link-icon fa fa-pencil-alt"></i>
                                                <span class="kt-nav__link-text">Editar Registro </span>
                                            </a> 
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" onclick="deleteSelectedDocuments()" id="btn-delete-rooms"
                                                class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-close-cross"></i>
                                                <span class="kt-nav__link-text">Eliminar seleccionados</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" onclick="compressByClient()" id="btn-delete-rooms"
                                                class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon-download-1"></i>
                                                <span class="kt-nav__link-text">Descargar seleccionados</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            &nbsp;
                            <a href="#" onclick="addDocumentClient()" class="btn btn-brand btn-elevate btn-icon-sm"
                                data-toggle="modal" data-target="#modal_add_client">
                                <i class="la la-plus"></i>
                                Nuevo Registro
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body" id="default-content-documents">
                <div>
                    <h1 class="text-uppercase text-center" style="font-size: 20px;">
                        <i class="flaticon2-plus display-1" style="color:var(--primary-color);"></i> <br>
                        <div style="font-size:15px; text-transform:initial; color:#000;">
                            Seleccioné un cliente de la tabla izquierda para cargar su historial</div>
                    </h1>
                </div>
            </div>
            <div class="kt-portlet__body w-100 p-0 pt-1" id="content-documents" style="display:none">
                <div class="container">
                    <!--begin: Datatable -->
                    <h1 class="text-center w-100 p-3" style="font-size:15px; color:#000; font-weight:bold;"
                        id="name-selected"></h1>
                    <table class="table-bordered table-hover table-data-custom table-documents-cover"
                        id="kt_table_documents">
                        <thead>
                            <tr>
                                <th style="" class="clean-icon-table">
                                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                                        <input type="checkbox" name="select_all" value="1" id="select-all-documents">
                                        <span></span>
                                    </label>
                                </th>
                                <th class="td-invisible">Document</th>
                                <th class="td-invisible">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!--end: Datatable -->
                <div class="container" id="documents-container">
                    <!--begin: Datatable -->


                </div>

            </div>
        </div>

        {{-- end table clients --}}

    </div>
    {{-- end table groups --}}

</div>
<!-- begin:: Content -->



<!--start: Modal Delete documents -->
<div class="modal fade" id="modal_delete_documents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('medical_history_delete_document') }}" method="POST" autocomplete="off">
                @csrf
                @method('delete')
                <div id="container-ids-documents-delete">
                </div>
                <div class="modal-body">
                    <h1 class="text-uppercase text-center" style="font-size: 20px;"> <i
                            class="flaticon-danger text-danger display-1"></i> <br> Realmente desea eliminar los
                        registros seleccionados.</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end: Modal Delete documents -->

<!--start: Modal Delete document -->
<div class="modal fade" id="modal_delete_document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ route('medical_history_delete_document') }}" method="POST" autocomplete="off">
                @csrf
                @method('delete')

                <input type="hidden" name="id[]" value="" id="id_delete_document">

                <div class="modal-body">
                    <h1 class="text-uppercase text-center" style="font-size: 20px;"> <i
                            class="flaticon-danger text-danger display-1"></i> <br> Realmente desea eliminar el
                        registro seleccionado.</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end: Modal Delete documents -->


<!--start: Modal add document in add client -->
<form action="{{ route('medical_history_add_document') }}" method="POST" autocomplete="off" role="presentation"
    enctype="multipart/form-data">
    @csrf
    @method('post')
    <input style="display:none">
    <input type="hidden" name="id_client" id="id-client-add-doc">
    <div class="modal fade" id="modal_add_document_client">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecciona el Registro</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="form-group text-center">
                        <label for="name-document" class="form-control-label">Nombre o título del Registro *</label>
                        <input type="text" name="name_document" class="form-control text-center" id="name-document"
                            value="{{ old('name_document') }}" autocomplete="new-password">
                    </div>
                    <div class="form-group text-center">
                        <label for="date-document" class="form-control-label">Fecha del Registro</label>
                        <input type="date" name="date_document" class="form-control text-center" id="date-document"
                            value="{{ old('date_document') }}" autocomplete="new-password">
                    </div>
                    <div class="row pt-4">
                        <div class="col-12">
                            <div class="form-group form-group-last">
                                <label for="observation">Observaciones</label>
                                {{-- Text Area observations or notes --}}
                                <textarea class="form-control" name="observation" id="observation" rows="3"
                                    style="margin-top: 0px; margin-bottom: 0px; height: 40vh; resize:none;">{{ old('observation') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center w-100 px-5 py-2">
                    <div class="btn btn-primary rounded-full " id="files-adj">
                        Añadir Adjunto
                    </div>
                    <div class="d-flex">

                        <div class="col-6 text-center">
                            <div class="d-flex justify-content-center align-items-center">

                                <label for="img-change-front" data-toggle="kt-tooltip" data-placement="top" title=""
                                    data-original-title="Clic para Eliminar">
                                    <img id="preview-front-document" class="preview-document"
                                        src="{{ asset('assets') }}/images/doc-front-default.png" />
                                </label>

                                <input type='file' id="img-change-front" style="display:none" name="front" accept="" />
                                <br>
                                {{-- <small>Clic sobre la imagen para cambiar</small> --}}
                            </div>

                        </div>

                        <div class="col-6 text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="img-change-back" data-toggle="kt-tooltip" data-placement="top" title=""
                                    data-original-title="Clic para Eliminar">
                                    <img id="preview-back-document" class="preview-document"
                                        src="{{ asset('assets') }}/images/doc-back-default.png" />
                                </label>

                                <input type='file' id="img-change-back" style="display:none" name="back" accept="" />
                                <br>
                                {{-- <small>Clic sobre la imagen para cambiar</small> --}}
                            </div>
                        </div>
                    </div>
                    <div id="speech" class="btn btn-primary rounded-full ">
                        <image id="microphone-img" src="{{ asset('assets') }}/images/microphone.png" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>

                </div>

            </div>
        </div>
    </div>
</form>
<!--end: Modal add document in add client -->

<!--start: Modal edit document client -->
<div class="modal fade" id="modal_edit_document_client" tabindex="-1" role="dialog"
    aria-labelledby="modal_edit_document_client_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_edit_document_client_label">Editar Registros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('medical_history_update_document')}}" id="edit-document-form"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" id="delete-back-input" name="delete_back" value="false">
                    <input type="hidden" id="delete-front-input" name="delete_front" value="false">
                    <input type="hidden" name="id" id="id-document-selected">
                    <div class="form-group">
                        <label for="name-document-edit-val">Nombre del Registro</label>
                        <input type="text" class="form-control" id="name-document-edit-val" name="name_document">
                    </div>
                    <div class="form-group">
                        <label for="observation-edit">Observación</label>
                        <textarea type="text" class="form-control" id="observation-edit" name="observation" 
                            style="margin-top: 0px; margin-bottom: 0px; height: 40vh; resize:none;">{{ old('observation') }}</textarea>
                    </div>
                    <!-- Modal Editar -->
                    <div class="d-flex justify-content-between align-items-center w-100 px-5 py-2">
                        <div class="btn btn-primary rounded-full " id="files-adj-edit">
                            Añadir Adjunto
                        </div>
                        <div class="d-flex">

                            <div class="col-6 text-center">
                                <div class="d-flex justify-content-center align-items-center">

                                    <label for="img-change-front-edit" data-toggle="kt-tooltip" data-placement="top"
                                        title="" data-original-title="Click para Cambiar">
                                        <img id="preview-front-document-edit-val" class="preview-document"
                                            src="{{ asset('assets') }}/images/doc-front-default.png" />
                                    </label>

                                    <input type='file' id="img-change-front-edit" style="display:none" name="front"
                                        accept="" />
                                    <br>
                                    {{-- <small>Clic sobre la imagen para cambiar</small> --}}
                                </div>

                            </div>

                            <div class="col-6 text-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <label for="img-change-back-edit" data-toggle="kt-tooltip" data-placement="top" title=""
                                        data-original-title="Clic para cambiar">
                                        <img id="preview-back-document-edit-val" class="preview-document"
                                            src="{{ asset('assets') }}/images/doc-back-default.png" />
                                    </label>

                                    <input type='file' id="img-change-back-edit" style="display:none" name="back"
                                        accept="" />
                                    <br>
                                    {{-- <small>Clic sobre la imagen para cambiar</small> --}}
                                </div>
                            </div>
                        </div>
                        <div id="speech-edit" class="btn btn-primary rounded-full ">
                            <image id="microphone-img" src="{{ asset('assets') }}/images/microphone.png" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--end: Modal edit document client -->


<!--start: Modal compress by client-->
<form action="{{ route('medical_history_compress_by_client') }}" id="modal_pass_compress_by_client_form" method="POST"
    autocomplete="off" role="presentation">
    @csrf
    @method('post')

    <div class="modal fade" id="modal_pass_compress_by_client">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comprimir en zip</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body text-center">

                    <small>El nombre por defecto será la fecha actual</small>
                    <div id="container-ids-compress-documents">

                    </div>

                    <div class="form-group text-center">
                        <label for="title-1" class="form-control-label">Nombre</label>
                        <input type="text" name="title" id="title-1" class="form-control text-center"
                            value="{{ old('title') }}" autocomplete="new-password">
                    </div>
                    <small>Para no establecer una contraseña deje los campos vacíos</small>
                    <div class="form-group text-center">
                        <label for="pass-1" class="form-control-label">Contraseña</label>
                        <input type="password" name="pass" id="pass-1" class="form-control text-center"
                            value="{{ old('pass') }}" autocomplete="new-password">
                    </div>

                    <div class="form-group text-center">
                        <label for="pass-repeat-1" class="form-control-label">Repetir contraseña</label>
                        <input type="password" name="pass_repeat" id="pass-repeat-1" class="form-control text-center"
                            value="{{ old('pass_repeat') }}" autocomplete="new-password">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Descargar</button>
                </div>
            </div>
        </div>
    </div>


</form>
<!--end: Modal compress by client -->

<!--start: Modal compress by clients-->
<form action="{{ route('medical_history_compress_by_clients') }}" id="modal_pass_compress_by_clients_form" method="POST"
    autocomplete="off" role="presentation">
    @csrf
    @method('post')

    <div class="modal fade" id="modal_pass_compress_by_clients">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comprimir en zip</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body text-center">

                    <small>El nombre por defecto será la fecha actual</small>
                    <div id="container-ids-compress-clients">

                    </div>

                    <div class="form-group text-center">
                        <label for="title-2" class="form-control-label">Nombre</label>
                        <input type="text" name="title" id="title-2" class="form-control text-center"
                            value="{{ old('title') }}" autocomplete="new-password">
                    </div>
                    <small>Para no establecer una contraseña deje los campos vacíos</small>
                    <div class="form-group text-center">
                        <label for="pass-2" class="form-control-label">Contraseña</label>
                        <input type="password" name="pass" id="pass-2" class="form-control text-center"
                            value="{{ old('pass') }}" autocomplete="new-password">
                    </div>

                    <div class="form-group text-center">
                        <label for="pass-repeat-2" class="form-control-label">Repetir contraseña</label>
                        <input type="password" name="pass_repeat" id="pass-repeat-2" class="form-control text-center"
                            value="{{ old('pass_repeat') }}" autocomplete="new-password">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Descargar</button>
                </div>
            </div>


        </div>
    </div>


</form>
<!--end: Modal compress by clients -->

<!--start: Modal compress by all-->
<form action="{{ route('medical_history_compress_all') }}" id="modal_compress_all_form" method="POST" autocomplete="off"
    role="presentation">
    @csrf
    @method('post')

    <div class="modal fade" id="modal_compress_all">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comprimir en zip</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body text-center">

                    <small>El nombre por defecto será la fecha actual</small>

                    <div class="form-group text-center">
                        <label for="title-3" class="form-control-label">Nombre</label>
                        <input type="text" name="title" id="title-3" class="form-control text-center"
                            value="{{ old('title') }}" autocomplete="new-password">
                    </div>
                    <small>Para no establecer una contraseña deje los campos vacíos</small>
                    <div class="form-group text-center">
                        <label for="pass-3" class="form-control-label">Contraseña</label>
                        <input type="password" name="pass" id="pass-3" class="form-control text-center"
                            value="{{ old('pass') }}" autocomplete="new-password">
                    </div>

                    <div class="form-group text-center">
                        <label for="pass-repeat-3" class="form-control-label">Repetir contraseña</label>
                        <input type="password" name="pass_repeat" id="pass-repeat-3" class="form-control text-center"
                            value="{{ old('pass_repeat') }}" autocomplete="new-password">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Descargar</button>
                </div>
            </div>

        </div>
    </div>

</form>
<!--end: Modal compress by all -->


<!--start: Modal info  -->
<div class="modal fade" id="modal-info-cell" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-info-cell-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>



            <div class="modal-body text-dark white-space-pre-wrap" id="modal-info-cell-content">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>
<!--end: Modal info -->

<input type="hidden" name="_token" id="token_ajax" value="{{ Session::token() }}">
<input type="hidden" name="_token2" id="token_ajax2" value="{{ Session::token() }}">
<!-- end:: Content -->
@endsection


@section('js_page_vendors')
<script src="https://cdnjs.cloudflare.com/ajax/libs/annyang/2.6.1/annyang.min.js" type="text/javascript"></script>
<script src="{{ asset("assets/$theme") }}/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
<script src="{{ asset("assets/$theme") }}/vendors/general/bootstrap-select/dist/js/bootstrap-select.js"
    type="text/javascript"></script>
<script src="{{ asset("assets/$theme") }}/vendors/custom/datatables/datatables.bundle.js" type="text/javascript">
</script>
<script src="{{ asset("assets/$theme") }}/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
@endsection

@section('js_optional_vendors')
@endsection
@section('js_page_scripts')
<script>
    var routePublicImages = @json(asset('assets') . '/images/');
    var routePublicStorage = @json(Storage::url('images/profiles/'));
</script>
<script src="{{ asset('assets') }}/js/page-medical-history.js" type="text/javascript"></script>
@endsection