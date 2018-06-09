.menu-primary {
    background-color: NAVBAR_BACKGROUND_COLOR;
}

.menu-primary .navbar-brand {
    color: NAVBAR_LINK_COLOR;
}

.menu-primary .navbar-brand:focus, .menu-primary .navbar-brand:hover {
    color: NAVBAR_LINK_HOVER_COLOR;
}

.menu-primary .navbar-text {
    color: NAVBAR_TEXT_COLOR;
}

.menu-primary .navbar-nav>li>a {
    color: NAVBAR_LINK_COLOR;
}

.menu-primary .navbar-nav>li>a:focus, .menu-primary .navbar-nav>li>a:hover {
    color: NAVBAR_LINK_HOVER_COLOR;
}

.menu-primary .navbar-nav>.active>a, .menu-primary .navbar-nav>.active>a:focus, .menu-primary .navbar-nav>.active>a:hover {
    color: NAVBAR_LINK_ACTIVE_COLOR;
}

.menu-primary .navbar-nav>.disabled>a, .menu-primary .navbar-nav>.disabled>a:focus, .menu-primary .navbar-nav>.disabled>a:hover {
    color: NAVBAR_LINK_DISABLED_COLOR;
}

.menu-primary .navbar-toggle {
    border-color: NAVBAR_BORDER_COLOR;
}

.menu-primary .navbar-collapse, .menu-primary .navbar-form {
    border-color: NAVBAR_BORDER_COLOR;
}

.menu-primary .navbar-nav>.open>a, .menu-primary .navbar-nav>.open>a:focus, .menu-primary .navbar-nav>.open>a:hover {
    color: NAVBAR_LINK_ACTIVE_COLOR;
}

@media (max-width: 991px) {
    .menu-primary .navbar-nav .open .dropdown-menu>li>a {
        color: NAVBAR_LINK_COLOR;
    }
    .menu-primary .navbar-nav .open .dropdown-menu>li>a:focus, .menu-primary .navbar-nav .open .dropdown-menu>li>a:hover {
        color: NAVBAR_LINK_HOVER_COLOR;
    }
    .menu-primary .navbar-nav .open .dropdown-menu>.active>a, .menu-primary .navbar-nav .open .dropdown-menu>.active>a:focus, .menu-primary .navbar-nav .open .dropdown-menu>.active>a:hover {
        color: NAVBAR_LINK_ACTIVE_COLOR;
    }
    .menu-primary .navbar-nav .open .dropdown-menu>.disabled>a, .menu-primary .navbar-nav .open .dropdown-menu>.disabled>a:focus, .menu-primary .navbar-nav .open .dropdown-menu>.disabled>a:hover {
        color: NAVBAR_LINK_DISABLED_COLOR;
    }
}

.menu-primary .navbar-link {
    color: NAVBAR_LINK_COLOR;
}

.menu-primary .navbar-link:hover {
    color: NAVBAR_LINK_HOVER_COLOR;
}

.menu-primary .btn-link {
    color: NAVBAR_LINK_COLOR;
}

.menu-primary .btn-link:focus, .menu-primary .btn-link:hover {
    color: NAVBAR_LINK_HOVER_COLOR;
}

.menu-primary .btn-link[disabled]:focus, fieldset[disabled] .menu-primary .btn-link:focus, .menu-primary .btn-link[disabled]:hover, fieldset[disabled] .menu-primary .btn-link:hover {
    color: NAVBAR_LINK_DISABLED_COLOR;
}

.menu-primary .navbar-nav>.current-menu-ancestor>a, .menu-primary .navbar-nav>.current-page-parent>a, .menu-primary .navbar-nav>.current-menu-parent>a, .menu-primary .navbar-nav>.current-menu-ancestor>a:focus, .menu-primary .navbar-nav>.current-page-parent>a:focus, .menu-primary .navbar-nav>.current-menu-parent>a:focus, .menu-primary .navbar-nav>.current-menu-ancestor>a:hover, .menu-primary .navbar-nav>.current-page-parent>a:hover, .menu-primary .navbar-nav>.current-menu-parent>a:hover {
    color: NAVBAR_LINK_ACTIVE_COLOR;
}

@media (max-width: 991px) {
    .menu-primary .navbar-nav>li>a {
        border-color: NAVBAR_BORDER_COLOR;
    }
    .menu-primary .navbar-nav .open .dropdown-menu .dropdown-header, .menu-primary .navbar-nav .open .dropdown-menu>li>a {
        border-color: NAVBAR_BORDER_COLOR;
    }
}

.menu-primary .navbar-form .search-field {
  color: NAVBAR_TEXT_COLOR;
  background-color: NAVBAR_BACKGROUND_COLOR;
  border-color: NAVBAR_BORDER_COLOR;
}

.menu-primary .navbar-form .search-field:focus {
  border-color: NAVBAR_INPUT_HOVER_COLOR;
}

.menu-primary .navbar-form .search-field::-moz-placeholder {
  color: NAVBAR_PLACEHOLDER_COLOR;
}
.menu-primary .navbar-form .search-field:-ms-input-placeholder {
  color: NAVBAR_PLACEHOLDER_COLOR;
}
.menu-primary .navbar-form .search-field::-webkit-input-placeholder {
  color: NAVBAR_PLACEHOLDER_COLOR;
}

.menu-primary .navbar-toggle::before {
    color: NAVBAR_TEXT_COLOR;
}
