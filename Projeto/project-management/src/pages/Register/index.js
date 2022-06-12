import { Link, useNavigate } from 'react-router-dom';

import { Container } from "./styles"
import useAuth from '../../hooks/useAuth';

export const Register = () => {
  const navigate = useNavigate();
  const { signUp } = useAuth();

  async function handleRegister() {
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;

    const res = await signUp(email, password);

    if (!res) {
      alert('Não foi possível realizar o cadastro!');
      return;
    }

    alert('Cadastro realizado com sucesso! Você será redirecionado para a página de login.');
    navigate('/');
  }

  return(
    <Container>
      <div className="login">
        <input id="email" type="email" placeholder="Email" />
        <input id="password" type="password" placeholder="Senha" />
        <button className="btn btn--green" onClick={handleRegister}>Cadastrar</button>
        <Link to="/login" className="register_button">Já tem uma conta? <span className="fw-700">Logar-se</span></Link>
      </div>
    </Container>
  )
}