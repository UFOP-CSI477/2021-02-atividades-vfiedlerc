import styled from "styled-components";

export const Container = styled.div`
  display: flex;
  background:${props => props.status === 2 ? '#9be9e363' : '#FFF'};
  border-radius: 8px;
  box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
  margin-bottom: 0.75em;
  padding: 1em 2em;

  :hover {
    cursor: pointer;
  }

  :active {
    opacity: 0.8;
  }

  .info_container {
    display: flex;
    align-items: center;
    justify-content: space-between;

    flex: 1;
    font-size: 1.3rem;
    user-select: none;
  }

  .information {
    span + span {
      margin-left: 1.5em;
    }
  }

  .title {
    font-weight: 700;
    font-size: 1.6rem;
  }
`;