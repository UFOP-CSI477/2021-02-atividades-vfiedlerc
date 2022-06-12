import styled from "styled-components";

export const Container = styled.div`
  display: flex;
  justify-content: space-between;
  background: #FFF;
  border-radius: 8px;
  box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
  margin-bottom: 0.75em;
  padding: 1em 2em;
  outline: ${props => props.active === true ? '2px solid #058179' : 'none'};

  :hover {
    cursor: pointer;
  }

  :active {
    opacity: 0.8;
  }

  .project_title {
    font-weight: 700;
    font-size: 1.6rem;
    user-select: none;
  }

  .edit_button {
    background: none;
    border: none;
    outline: none;
    display: flex;
  }

  .edit_button:hover {
    cursor: pointer;
  }

  .edit_button:active {
    outline: 1px solid black;
    border-radius: 2px;
  }

  .edit_button::before {
    content: '...';
    font-size: 2.5rem;
    line-height: 0.1;
    text-align: center;
    letter-spacing: 1px;
  }
`;