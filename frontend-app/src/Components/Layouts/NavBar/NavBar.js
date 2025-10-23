import { Nav, Navbar, NavDropdown, Container } from 'react-bootstrap';
import { Link, useNavigate } from 'react-router-dom'; // ✅ من react-router-dom
import { useTranslation } from 'react-i18next';

export default function NavBar() {
  const { t, i18n } = useTranslation();

const navigate = useNavigate();

const handleLogout = () => {
    localStorage.removeItem("token");
    navigate("/login");
};

  const changeLanguage = (lng) => {
    i18n.changeLanguage(lng);
    //document.dir = lng === 'ar' ? 'rtl' : 'ltr';
  };

  return (
    <Navbar expand="lg" bg="white" className="shadow-sm p-3" style={{marginTop:'0'}} >
      <Container>
        <Navbar.Brand as={Link} to="/">FM delivery</Navbar.Brand>
        <Navbar.Toggle aria-controls="navbarNav" />
        <Navbar.Collapse id="navbarNav">
          <Nav className="ms-auto">
            <Nav.Link as={Link} to="/">{t("home")}</Nav.Link>
            <Nav.Link as={Link} to="/categories">{t("categories")}</Nav.Link>
            <Nav.Link as={Link} to="/products">{t("products")}</Nav.Link>
            <Nav.Link as={Link} to="/about">{t("about")}</Nav.Link>

            <NavDropdown title={t("language")} id="navbarDropdown">
              <NavDropdown.Item onClick={() => changeLanguage('en')}>English</NavDropdown.Item>
              <NavDropdown.Item onClick={() => changeLanguage('ar')}>العربية</NavDropdown.Item>
            </NavDropdown>

            <Nav.Link as={Link} to="/cart">
              <i className="bi bi-cart"></i>
            </Nav.Link>

            <Nav.Link href="#" onClick={handleLogout}>
                {t("logout")}
            </Nav.Link>
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}
