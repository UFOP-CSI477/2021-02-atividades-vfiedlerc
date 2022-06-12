import { Container } from './styles'

export const Activity = ({ name, dueDate, status, handleOpenActivityModal}) => {
  return (
    <Container
      status={status}
      onClick={handleOpenActivityModal}
    >
      <div className="info_container">
        <span className="title">{name}</span>
        <div className="information">
          <span>{dueDate}</span>
          <span>{status == 1 ? 'Pendente' : 'Concluído'}</span>
        </div>
      </div>
    </Container>
  );
}