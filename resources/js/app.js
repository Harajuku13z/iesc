import './bootstrap';

// Import Bootstrap only for non-admin pages
if (!window.location.pathname.startsWith('/admin')) {
    import('bootstrap/dist/js/bootstrap.bundle.min.js');
}
import 'bootstrap-icons/font/bootstrap-icons.css';
