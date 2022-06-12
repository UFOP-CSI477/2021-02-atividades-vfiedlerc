import { useEffect, useState } from "react";

import { api } from '../../services/api';
import useAuth from '../../hooks/useAuth';
import { Container, Content, ProjectListing } from "./styles";
import { Project } from '../Project';
import { ProjectModal } from "../ProjectModal";

export const Projects = ({ activeProject }) => {
  const { signed, user } = useAuth();
  const [projects, setProjects] = useState([]);
  const [projectModalIsOpen, setProjectModalIsOpen] = useState(false);
  const [projectIdInUpdate, setProjectIdInUpdate] = useState(false);

  useEffect(() => {
    if (!signed) {
      return;
    }

    api.get('projects', {
        headers: {
          'Authorization': `Bearer ${user.token}`
        }
      })
      .then(res => {
        const fetchedProjects = res.data.map(el => {
          return {
            id: el. id,
            name: el.name,
            category: el.category,
            budget: el.budget
          }
        });

        setProjects(fetchedProjects);
      })
  }, [user]);

  function handleOpenProjectModal() {
    setProjectModalIsOpen(true);
  }

  function handleCloseProjectModal() {
    setProjectIdInUpdate(false);
    setProjectModalIsOpen(false);
  }

  function handleAddProject({ name, category, budget }) {
    api.post('projects', {
        name,
        category,
        budget
      }, {
        headers: {
          'Authorization': `Bearer ${user.token}`
        }
      })
      .then(res => {
        const project = {
          id: res.data.id,
          name: res.data.name,
          category: res.data.category,
          budget: res.data.budget
        }

        activeProject.set(project.id);
        setProjects([...projects, project]);
      })
      .catch(err => {
        console.log(err)
      });
  }

  function handleDeleteProject(id) {
    api.delete(`projects/${id}`, {
        headers: {
          'Authorization': `Bearer ${user.token}`
        }
      })
      .then(res => {
        setProjects(projects.filter(el => el.id !== id));
      })
      .catch(err => console.log(err));
  }

  function handleOpenProjectModalForUpdate(projectId) {
    setProjectIdInUpdate(projectId);
    handleOpenProjectModal();
  }

  function handleUpdateProject({ id, name, category, budget }) {
    api.put(`projects/${id}`, {
        name,
        category,
        budget
      }, {
        headers: {
          'Authorization': `Bearer ${user.token}`
        }
      })
      .then(res => {
        const project = { id, name, category, budget };

        let updatedProjects = [...projects];
        updatedProjects = updatedProjects.filter(el => el.id !== id)

        setProjects([...updatedProjects, project]);
      })
      .catch(err => console.log(err));
  }

  return (
    <>
      <Container>
        <Content>
          <div className="title">
            <h2>✨ Projetos</h2>
            <button className="btn btn--green" onClick={handleOpenProjectModal}>Criar</button>
          </div>
          <ProjectListing>
            {projects.map(el => {
              return (
                <Project
                  key={el.id}
                  id={el.id}
                  name={el.name}
                  active={activeProject.get() === el.id}
                  handleSwitchActiveProject={() => activeProject.set(el.id)}
                  handleOpenProjectModalForUpdate={() => handleOpenProjectModalForUpdate(el.id)}
                />
              );
            })}
          </ProjectListing>
        </Content>

        <ProjectModal
          modalIsOpen={projectModalIsOpen}
          handleCloseModal={handleCloseProjectModal}
          handleAddProject={handleAddProject}
          handleUpdateProject={handleUpdateProject}
          handleDeleteProject={handleDeleteProject}
          projectIdInUpdate={projectIdInUpdate}
          projects={projects}
        />
      </Container>
    </>
  );
}