import { Link, useNavigate } from 'react-router-dom';

import { Container } from "./styles"
import useAuth from '../../hooks/useAuth';
import { useEffect } from 'react';

export const Login = () => {
  const { signed, signIn, user } = useAuth();
  const navigate = useNavigate();

  useEffect(() => {
    if (signed) {
      navigate('/');
    }
  }, [signed]);

  async function handleLogin() {
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;

    const res = await signIn(email, password);

    if (!res) {
      alert('Email ou senha incorretos.');
      return;
    }

    navigate('/');
  }

  if (!signed && !localStorage.getItem('user')) {
    return (
      <Container>
        <div className="login">
          <input id="email" type="email" placeholder="Email" />
          <input id="password" type="password" placeholder="Senha" />
          <button className="btn btn--green" onClick={handleLogin}>Login</button>
          <Link to="/register" className="register_button">Não tem conta? <span className="fw-700">Cadastre-se</span></Link>
        </div>
      </Container>
    );
  }

  return;
}