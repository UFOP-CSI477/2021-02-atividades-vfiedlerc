import { Container } from './styles'

export const Project = ({ id, name, active, handleSwitchActiveProject, handleOpenProjectModalForUpdate }) => {
  return (
    <Container
      active={active}
      onClick={() => handleSwitchActiveProject()}
    >
      <div className="project_title">
        {name}
      </div>
      <button className="edit_button" onClick={() => handleOpenProjectModalForUpdate(id)}></button>
    </Container>
  );
}