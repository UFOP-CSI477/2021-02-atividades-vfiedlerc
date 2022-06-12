import styled from "styled-components";

export const Container = styled.div`
  padding: 1.5em 1.5em 1.5em 0;
`;

export const Content = styled.div`
  background: #FFF;
  border-radius: 1em;
  height: 100%;
  padding: 1.5em 2em;

  display: flex;
  flex-direction: column;
  gap: 2em;
`;

export const ActionsBar = styled.div`
  display: flex;
  justify-content: space-between;
  align-items: center;

  h2 {
    font-size: 2.6rem;
    font-weight: 700;
    letter-spacing: 1px;
  }
`;

export const Listing = styled.div`
  display: flex;
  flex-direction: column;

  background: #F7F7F7;
  flex: 1;
  border-radius: 1em;
  padding: 2em;
`;