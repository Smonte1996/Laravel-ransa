import Swal from 'sweetalert2';
window.Swal = Swal;
require('./bootstrap');
require('./custom.min');
require('./login');
require('./dissatisfaction_service');
require('./reclamo_rqr');
require('./muestreo');
require('./Asignacion');
require('./ConfirmacionEstibas');
require('./user_clients');

import select2 from 'select2';



import Alpine from 'alpinejs';


window.Alpine = Alpine;

Alpine.start();