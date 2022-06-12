import Modal from 'react-modal';
import { api } from '../../services/api';

import { Container } from "./styles";

export const ProjectModal = ({ modalIsOpen, handleCloseModal, handleAddProject, handleUpdateProject, handleDeleteProject, projectIdInUpdate, projects }) => {
  Modal.setAppElement('#root');

  function handleSave() {
    const data = {
      name: document.querySelector('#newProjectName').value,
      category: document.querySelector('#newProjectCategory').value,
      budget: document.querySelector('#newProjectBudget').value
    }

    if (projectIdInUpdate) {
      handleUpdateProject({
        ...data,
        id: projectIdInUpdate,
      });
      handleCloseModal();

      return;
    }

    handleAddProject(data);
    handleCloseModal();
  }

  function handleDelete() {
    handleDeleteProject(projectIdInUpdate);
    handleCloseModal();
  }

  let projectBeingUpdate = false;

  if (projectIdInUpdate) {
    projectBeingUpdate = projects.find(el => el.id === projectIdInUpdate);
  }

  const deleteButton =
    <button
      className="btn btn--red"
      onClick={() => handleDelete()}
    >
      Remover
    </button>;

  return (
    <Modal
      isOpen={modalIsOpen}
      onRequestClose={handleCloseModal}
      contentLabel="Project Modal"
      overlayClassName="Modal_overlay"
      className="Modal_content"
    >
      <Container>
        <h2>{projectIdInUpdate ? 'Editar projeto' : 'Criar novo projeto'}</h2>

        <input id="newProjectName" type="text" placeholder="Nome" defaultValue={projectIdInUpdate ? projectBeingUpdate.name : ''} />
        <input id="newProjectCategory" type="text" placeholder="Categoria" defaultValue={projectIdInUpdate ? projectBeingUpdate.category : ''} />
        <input id="newProjectBudget" type="text" placeholder="Orçamento" defaultValue={projectIdInUpdate ? projectBeingUpdate.budget : ''} />

        <button
          className="btn btn--green"
          onClick={() => handleSave()}
        >
          Salvar
        </button>
        {projectIdInUpdate ? deleteButton : ''}
      </Container>
    </Modal>
  )
}