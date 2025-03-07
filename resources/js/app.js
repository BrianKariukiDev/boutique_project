import './bootstrap';
import 'preline';

import Swal from 'sweetalert2'

window.Swal = Swal

document.addEventListener('livewire:load', () => {
    window.HSSStaticMethods.autoinit();
    });