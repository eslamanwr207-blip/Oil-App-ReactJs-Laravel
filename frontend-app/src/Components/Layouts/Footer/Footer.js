import './Footer.css';

import { Container, Row, Col } from 'react-bootstrap';
import { Link } from 'react-router-dom';

import './Footer.css';
import { useTranslation } from 'react-i18next';

export default function Footer() {
    const {t, i18n} = useTranslation();

    const changeLanguage =(lng)=>{
        i18n.changeLanguage(lng);
    }

    
    return (
        <footer className="footer mt-5 bg-light text-dark pt-4">
            <Container>
                <Row>
                    <Col md={4}>
                        <h5>FM Delivery</h5>
                        <p>{t("top_quality_statement")}</p>
                    </Col>

                    <Col md={4}>
                        <h5>{t("quick_links")}</h5>
                        <ul className="list-unstyled">
                            <li><Link to="/">{t("home")}</Link></li>
                            <li><Link to="/categories">{t("categories")}</Link></li>
                            <li><Link to="/products">{t("products")}</Link></li>
                            <li><Link to="/about_us">{t("about")}</Link></li>
                        </ul>
                    </Col>

                    <Col md={4}>
                        <h5>{t("follow_us")}</h5>
                        <ul className="social-icons list-unstyled d-flex gap-3">
                            <li><a href="#"><i className="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i className="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i className="bi bi-instagram"></i></a></li>
                        </ul>
                    </Col>
                </Row>
                <hr />
                <p className="text-center mt-3">
                     {t("copyright")}
                </p>
            </Container>
        </footer>
    );
}
