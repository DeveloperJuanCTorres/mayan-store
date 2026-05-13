@extends('layouts.app')

@section('content')

<div class="bg-[#f8f6f2] text-[#1a1a1a] min-h-screen">

    <!-- HERO -->
    <section class="relative pt-48 pb-24 overflow-hidden">

        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#c8a96b]/10 rounded-full blur-3xl"></div>

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10 relative z-10">

            <div class="grid lg:grid-cols-2 gap-20 items-end">

                <div>

                    <p class="uppercase tracking-[0.45em] text-[#c8a96b] text-xs mb-8">
                        Xuping
                    </p>

                    <h1 class="text-6xl md:text-8xl font-serif font-light leading-[0.95] tracking-tight mb-10">
                        Libro de

                        <span class="italic text-[#c8a96b]">
                            Reclamaciones
                        </span>
                    </h1>

                </div>

                

            </div>

        </div>

    </section>

    <!-- FORM -->
    <section class="pb-32">

        <div class="max-w-screen-2xl mx-auto px-6 lg:px-10">

            <div class="bg-white border border-[#ece7df] p-8 md:p-14">

                <!-- TITULO -->
                <div class="mb-16">

                    <h2 class="text-4xl md:text-5xl font-serif font-light leading-tight">
                        Queremos ayudarte
                    </h2>

                </div>

                <!-- SECCION 1 -->
                <div class="mb-20">

                    <h3 class="text-2xl font-serif border-b border-[#ece7df] pb-5 mb-10">
                        1. Datos de la persona que presenta la queja o reclamo
                    </h3>

                    <div class="grid grid-cols-12 gap-6">

                        <!-- Fecha -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Fecha nacimiento
                            </label>

                            <input
                                required
                                type="date"
                                id="fecha_nac"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition"
                            >

                        </div>

                        <!-- Tipo doc -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Tipo documento
                            </label>

                            <select
                                required
                                name="tipo_doc"
                                id="tipo_doc"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition"
                            >
                                <option value="0">-Seleccionar-</option>
                                <option value="DNI">DNI</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            </select>

                        </div>

                        <!-- Numero -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Número documento
                            </label>

                            <input
                                type="number"
                                id="numero_doc"
                                max="9999999999"
                                oninput="this.value = this.value.slice(0, 10)"
                                placeholder="Documento"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition"
                            >

                        </div>

                        <!-- Nombre -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Nombre
                            </label>

                            <input
                                type="text"
                                id="nombres"
                                placeholder="Nombre"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition inputTexto"
                            >

                        </div>

                        <!-- Apellido paterno -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Apellido paterno
                            </label>

                            <input
                                type="text"
                                id="apellido_pat"
                                placeholder="Apellido paterno"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition inputTexto"
                            >

                        </div>

                        <!-- Apellido materno -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Apellido materno
                            </label>

                            <input
                                type="text"
                                id="apellido_mat"
                                placeholder="Apellido materno"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition inputTexto"
                            >

                        </div>

                        <!-- Email -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                placeholder="Email"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition inputTexto"
                            >

                        </div>

                        <!-- Telefono -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-3">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Teléfono
                            </label>

                            @include('partials.phone')

                        </div>

                        <!-- Departamento -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Departamento
                            </label>

                            <select
                                id="departamento"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition departamento"
                                name="mauticform[departamento]"
                            >
                                <option value="">-Seleccionar-</option>
                            </select>

                        </div>

                        <!-- Provincia -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Provincia
                            </label>

                            <select
                                id="provincia"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition provincia"
                                name="mauticform[provincia1]"
                            >
                                <option value="">-Seleccionar-</option>
                            </select>

                        </div>

                        <!-- Distrito -->
                        <div class="col-span-12 md:col-span-6 lg:col-span-4">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Distrito
                            </label>

                            <select
                                id="distrito"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition distrito"
                                name="mauticform[distrito1]"
                            >
                                <option value="">-Seleccionar-</option>
                            </select>

                        </div>

                        <!-- Direccion -->
                        <div class="col-span-12">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Dirección fiscal
                            </label>

                            <input
                                maxlength="100"
                                type="text"
                                id="direccion"
                                placeholder="Dirección"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition"
                            >

                        </div>

                    </div>

                </div>

                <!-- SECCION 2 -->
                <div>

                    <h3 class="text-2xl font-serif border-b border-[#ece7df] pb-5 mb-10">
                        2. Información general
                    </h3>

                    <div class="grid grid-cols-12 gap-6">

                        <!-- Orden -->
                        <div class="col-span-12 lg:col-span-6">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Orden de compra
                            </label>

                            <input
                                type="text"
                                maxlength="10"
                                id="orden_compra"
                                placeholder="Orden de compra"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition inputTexto"
                            >

                        </div>

                        <!-- Monto -->
                        <div class="col-span-12 lg:col-span-6">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Monto del producto/servicio
                            </label>

                            <input
                                type="number"
                                id="monto"
                                max="99999"
                                oninput="this.value = this.value.slice(0, 5)"
                                placeholder="Monto"
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 focus:outline-none focus:border-[#c8a96b] transition"
                            >

                        </div>

                        <!-- Reclamo -->
                        <div class="col-span-12 lg:col-span-6">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Detalla tu queja/reclamo
                            </label>

                            <textarea
                                maxlength="500"
                                id="reclamo"
                                rows="6"
                                placeholder="Escribe aquí..."
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 resize-none focus:outline-none focus:border-[#c8a96b] transition inputTexto"
                            ></textarea>

                        </div>

                        <!-- Pedido -->
                        <div class="col-span-12 lg:col-span-6">

                            <label class="block text-xs uppercase tracking-[0.25em] text-[#777] mb-3">
                                Pedido
                            </label>

                            <textarea
                                maxlength="500"
                                id="pedido"
                                rows="6"
                                placeholder="Escribe aquí..."
                                class="w-full border border-[#d6d3d1] bg-white px-5 py-4 resize-none focus:outline-none focus:border-[#c8a96b] transition inputTexto"
                            ></textarea>

                        </div>

                        <!-- Boton -->
                        <div class="col-span-12 text-center pt-8">

                            <button
                                class="bg-[#1a1a1a] text-white px-12 py-5 uppercase tracking-[0.3em] text-xs hover:bg-[#c8a96b] transition duration-500 EnviarReclamo"
                            >
                                Enviar reclamo
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    document.querySelectorAll('.inputTexto').forEach(function (input) {
        input.addEventListener('input', function (e) {
            const prohibido = /[<>{};*$%=()&]/g; // Caracteres que quieres bloquear
            if (prohibido.test(e.target.value)) {
                e.target.value = e.target.value.replace(prohibido, '');
            }
        });
    });
</script>  

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let token = $('meta[name="csrf-token"]').attr('content');

    $(function() {
        $(".EnviarReclamo").on('click',function () {
            var fechanac = $("#fecha_nac").val();
            var tipodoc = $("#tipo_doc").val();
            var numerodoc = $("#numero_doc").val();
            var nombres = $("#nombres").val();
            var apellidopat = $("#apellido_pat").val();
            var apellidomat = $("#apellido_mat").val();
            var email = $("#email").val();
            var telefono = $("#telefono").val();
            var departamento = $("#departamento").val();
            var provincia = $("#provincia").val();
            var distrito = $("#distrito").val();
            var direccion = $("#direccion").val();
            var ordencompra = $("#orden_compra").val();
            var monto = $("#monto").val();
            var reclamo = $("#reclamo").val();
            var pedido = $("#pedido").val();

            if(fechanac == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu fecha de nacimiento"
                });
                return false;
            }            
            if(tipodoc == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar tu Tipo de Documento"
                });
                return false;
            }
            if(numerodoc == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar tu Numero de Documento"
                });
                return false;
            }
            if(nombres == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar tu nombre"
                });
                return false;
            }
            if(apellidopat == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar tu Apellido Paterno"
                });
                return false;
            }
            if(email == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tiene que ingresar un correo electrónico"
                });
                return false;
            }
            else
            {
                const valido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
                if (!valido) {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                    icon: "error",
                    title: "Correo no válido"
                    });
                    return false;
                }
            }
            if(apellidomat == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Apellido Materno"
                });
                return false;
            }
            if(telefono == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Teléfono de contacto"
                });
                return false;
            }
            if(departamento == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que seleccionar tu Departamento"
                });
                return false;
            }
            if(provincia == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que seleccionar tu Provincia"
                });
                return false;
            }
            if(distrito == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que seleccionar tu Distrito"
                });
                return false;
            }
            if(direccion == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Dirección"
                });
                return false;
            }
            if(ordencompra == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Orden de Compra"
                });
                return false;
            }
            if(monto == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar el Monto del producto/servicio"
                });
                return false;
            }
            if(reclamo == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Reclamo"
                });
                return false;
            }
            if(pedido == ''){
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "warning",
                title: "Tienes que ingresar tu Pedido"
                });
                return false;
            }

            Swal.fire({
                header: '...',
                title: 'loading...',
                allowOutsideClick:false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: "/reclamo",
                method: "post",
                dataType: 'json',
                data: {
                    _token: token,
                    fechanac : fechanac,
                    tipodoc : tipodoc,
                    numerodoc: numerodoc,
                    nombres: nombres,
                    apellidopat: apellidopat,
                    apellidomat: apellidomat,
                    email: email,
                    telefono: telefono,
                    departamento: departamento,
                    provincia: provincia,
                    distrito: distrito,
                    direccion: direccion,
                    ordencompra: ordencompra,
                    monto: monto,
                    reclamo: reclamo,
                    pedido: pedido,
                },
                success: function (response) {
                    if (response.status) {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                        });
                        Toast.fire({
                        icon: "success",
                        title: response.msg
                        });
                        $("#fecha_nac").val('');
                        $("#tipo_doc").val('');
                        $("#numero_doc").val('');
                        $("#nombres").val('');
                        $("#apellido_pat").val('');
                        $("#apellido_mat").val('');
                        $("#email").val('');
                        $("#telefono").val('');
                        $("#departamento").val('');
                        $("#provincia").val('');
                        $("#distrito").val('');
                        $("#direccion").val('');
                        $("#orden_compra").val('');
                        $("#monto").val('');
                        $("#reclamo").val('');
                        $("#pedido").val('');
                        return false;
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: response.msg,
                        })
                    }
                    $("#fecha_nac").val('');
                    $("#tipo_doc").val('');
                    $("#numero_doc").val('');
                    $("#nombres").val('');
                    $("#apellido_pat").val('');
                    $("#apellido_mat").val('');
                    $("#email").val('');
                    $("#telefono").val('');
                    $("#departamento").val('');
                    $("#provincia").val('');
                    $("#distrito").val('');
                    $("#direccion").val('');
                    $("#orden_compra").val('');
                    $("#monto").val('');
                    $("#reclamo").val('');
                    $("#pedido").val('');
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!!',
                        text: 'Algo salió mal, Inténtalo más tarde!',
                    })
                }
            });
        });
    })
</script>

@endsection