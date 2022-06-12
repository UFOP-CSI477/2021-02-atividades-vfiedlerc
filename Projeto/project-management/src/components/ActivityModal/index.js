import Modal from 'react-modal';

import { Container } from "./styles";

export const ActivityModal = ({ modalIsOpen, handleCloseModal, handleAddActivity, handleUpdateActivity, handleDeleteActivity, activityIdInUpdate, currentProjectId, activities }) => {
  Modal.setAppElement('#root');

  let currentActivity = false;

  if (activityIdInUpdate) {
    currentActivity = activities.filter(el => el.id === activityIdInUpdate)[0];
  }

  function handleSave() {
    const data = {
      projectId: currentProjectId,
      name: document.querySelector('#newActivityName').value,
      dueDate: document.querySelector('#newActivityDueDate').value,
      status: currentActivity.status || 1,
    }

    if (activityIdInUpdate) {
      handleUpdateActivity({
        ...data,
        id: activityIdInUpdate,
      });
      handleCloseModal();
      return;
    }

    handleAddActivity(data);
    handleCloseModal();
  }

  function handleConclude() {
    const data = {
      projectId: currentProjectId,
      name: document.querySelector('#newActivityName').value,
      dueDate: document.querySelector('#newActivityDueDate').value,
      status: 2,
    }

    handleUpdateActivity({
      ...data,
      id: activityIdInUpdate,
    });
    handleCloseModal();
  }

  function handleDelete(activityId) {
    handleDeleteActivity(activityId);
    handleCloseModal();
  }

  const concludeButton =
    <button
      className="btn btn--blue"
      onClick={() => handleConclude()}
    >
      Concluir
    </button>;

  const deleteButton =
    <button
      className="btn btn--red"
      onClick={() => handleDelete(activityIdInUpdate)}
    >
      Remover
    </button>;

  return (
    <Modal
      isOpen={modalIsOpen}
      onRequestClose={handleCloseModal}
      contentLabel="Activity Modal"
      overlayClassName="Modal_overlay"
      className="Modal_content"
    >
      <Container>
        <h2>{currentActivity ? 'Editar atividade' : 'Criar nova atividade'}</h2>

        <input id="newActivityName" type="text" placeholder="Nome" defaultValue={currentActivity.name || ''} />
        <input id="newActivityDueDate" type="date" placeholder="Vencimento" defaultValue={currentActivity.dueDate || ''} />

        <button
          className="btn btn--green"
          onClick={() => handleSave()}
        >
          Salvar
        </button>
        {currentActivity && currentActivity.status === 1 ? concludeButton : ''}
        {activityIdInUpdate ? deleteButton : ''}
      </Container>
    </Modal>
  )
}