<footer class="bg-dark text-white mt-auto py-1">{{--agrego fondo de color negro, texto blanco, margen superior automático para empujar el footer hacia abajo y padding vertical de 1--}}
    <br>
    <div class="container">
        <div class="row text-center text-md-start">
        {{--agrego primera columna de información con medidas de margenes--}}
            <div class="col-md-4 mb-1"> 
                <h3 class="text-uppercase fw-bold mb-2">Información </h3> 
                <ul class="list-unstyled mb-1">
                    <li><a href="/quienes-somos" class="text-white text-decoration-none"> Sobre Nosotros</a></li>
                    <li><a href="#" class="text-white text-decoration-none"> Devoluciones</a></li>
                    <li><a href="#" class="text-white text-decoration-none"> Botón de Arrepentimiento</a></li>
                    <li><a href="/terminos-y-usos" class="text-white text-decoration-none"> Términos y Condiciones</a></li>
                   
                </ul>
            </div>
            {{--agrego segunda columna de información con medidas de margenes y alineación de texto centrada--}}
            <div class="col-md-4 mb-1 text-center">
                <h3 class="text-uppercase fw-bold mb-2"> Horario de Atención</h3>
                <p class="mb-1"> Lunes a Sábados:</p>
                <p>8:00 a 13:00 y de 17:00 a 21:00</p>

            </div> 
            {{-- agrego tercera columna de información con medidas de margenes y alineación de texto a la derecha en pantallas medianas y a la izquierda en pantallas pequeñas --}}
            <div class="col-md-4 mb-1 text-md-end text-center">
                <h3 class="text-uppercase fw-bold mb-2">Contacto</h3>
                <p class="mb-1">📞 3794-770467</p>
                <p class="mb-1"> <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e3e3e3"><path d="M168-192q-29.7 0-50.85-21.16Q96-234.32 96-264.04v-432.24Q96-726 117.15-747T168-768h624q29.7 0 50.85 21.16Q864-725.68 864-695.96v432.24Q864-234 842.85-213T792-192H168Zm312-240L168-611v347h624v-347L480-432Zm0-85 312-179H168l312 179Zm-312-94v-85 432-347Z"/></svg> indumentariasport@gmail.com</p>
            </div>

        </div>

        {{-- redes sociales --}}
       <hr class="bg-secondary">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <a href="#" class="text-white me-3 text-decoration-none">Facebook</a>
                <a href="#" class="text-white me-3 text-decoration-none">Instagram</a>
                <a href="#" class="text-white text-decoration-none">X</a>
            </div>
 
            <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                <img src="{{ asset('img/data-fiscal.png') }}" alt="Data Fiscal" style="width: 30px;" class="me-2">
                <span>© 2026 Corrientes, Argentina</span>
            </div>
        </div>
    </div>
    <br>
</footer>
