import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';

import useAuth from '../../hooks/useAuth';
import { Container } from './styles.js'
import { Panel } from '../../components/Panel/index.js'
import { Projects } from '../../components/Projects/index.js'

export const Home = () => {
  const navigate = useNavigate();
  const { signed } = useAuth();
  const [activeProject, setActiveProject] = useState(null);

  useEffect(() => {
    if (!signed) {
      navigate('/login');
      return;
    }
  }, []);

  if (!signed) {
    return;
  }

  return (
    <Container>
      <Projects
        activeProject={{ get: () => activeProject, set: setActiveProject }}
      />
      <Panel
        activeProject={{ get: () => activeProject, set: setActiveProject }}
      />
    </Container>
  )
}