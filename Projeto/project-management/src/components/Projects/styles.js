import styled from "styled-components";

export const Container = styled.div`
  padding: 1.5em 1.5em;
`;

export const Content = styled.div`
  display: flex;
  flex-direction: column;

  background: #FFF;
  border-radius: 1em;
  padding: 1.5em 2em;
  height: 100%;

  .title {
    display: flex;
    justify-content: space-between;
    align-items: center;

    padding-bottom: 3rem;

    h2 {
      font-size: 2.6rem;
      font-weight: 700;
      letter-spacing: 1px;
    }
  }
`;

export const ProjectListing = styled.div`
  background: #F7F7F7;
  flex: 1;
  border-radius: 1em;
  padding: 2em;
`;