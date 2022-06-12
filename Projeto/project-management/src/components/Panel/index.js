import { useEffect, useState } from "react";

import { ActionsBar, Container, Content, Listing } from "./styles";
import { Activity } from '../Activity';
import { api } from "../../services/api";
import { ActivityModal } from "../ActivityModal";
import useAuth from '../../hooks/useAuth';

export const Panel = ({ activeProject }) => {
  const { signed, user } = useAuth();
  const [activities, setActivities] = useState([]);
  const [activityModalIsOpen, setActivityModalIsOpen] = useState(false);
  const [activityIdInUpdate, setActivityIdInUpdate] = useState(false);

  useEffect(() => {
    if (!signed) {
      return
    }

    api.get('activities', {
      headers: {
        'Authorization': `Bearer ${user.token}`
      }
    })
      .then(res => {
        const fetchedActivities = res.data.map(el => {
          return {
            id: el. id,
            projectId: el.project_id,
            name: el.name,
            dueDate: el.due_date,
            status: el.status
          }
        });

        setActivities(fetchedActivities);
      })
  }, [user]);

  function handleOpenActivityModal() {
    setActivityModalIsOpen(true);
  }

  function handleCloseActivityModal() {
    setActivityIdInUpdate(false);
    setActivityModalIsOpen(false);
  }

  function handleOpenActivityModalForUpdate(activityId) {
    setActivityIdInUpdate(activityId);
    setActivityModalIsOpen(true)
  }

  function handleAddActivity({ projectId, name, dueDate }) {
    api.post('activities', {
        project_id: projectId,
        name,
        due_date: dueDate,
        status: 1
      },
      {
        headers: {
          'Authorization': `Bearer ${user.token}`
        }
      })
      .then(res => {
        const activity = {
          id: res.data.id,
          projectId: res.data.project_id,
          name: res.data.name,
          dueDate: res.data.due_date,
          status: res.data.status
        }

        setActivities([...activities, activity]);
      })
      .catch(err => console.log(err));
  }

  function handleUpdateActivity({ id, projectId, name, dueDate, status }) {
    api.put(`activities/${id}`, {
        project_id: projectId,
        name,
        due_date: dueDate,
        status
      },
      {
        headers: {
          'Authorization': `Bearer ${user.token}`
        }
      })
      .then(res => {
        const activity = {
          id,
          projectId,
          name,
          dueDate,
          status
        }

        let updatedActivities = [...activities];
        updatedActivities = updatedActivities.filter(el => el.id !== id)

        setActivities([...updatedActivities, activity]);
      })
      .catch(err => console.log(err));
  }

  function handleDeleteActivity(id) {
    api.delete(`activities/${id}`, {
        headers: {
          'Authorization': `Bearer ${user.token}`
        }
      })
      .then(res => {
        setActivities(activities.filter(el => el.id !== id));
      })
      .catch(err => console.log(err));
  }

  return (
    <Container>
      <Content>
        <ActionsBar>
          <h2>📝 Atividades</h2>
          <button className="btn btn--green" onClick={handleOpenActivityModal}>Criar</button>
        </ActionsBar>
        <Listing>
          {activities
            .filter(el => el.projectId === activeProject.get())
            .map(el => {
              return (
                <Activity
                  key={el.id}
                  name={el.name}
                  dueDate={el.dueDate}
                  status={el.status}
                  handleOpenActivityModal={() => handleOpenActivityModalForUpdate(el.id)}
                />
              );
            })}
        </Listing>
      </Content>

      <ActivityModal
        modalIsOpen={activityModalIsOpen}
        handleCloseModal={handleCloseActivityModal}
        handleAddActivity={handleAddActivity}
        handleUpdateActivity={handleUpdateActivity}
        handleDeleteActivity={handleDeleteActivity}

        activityIdInUpdate={activityIdInUpdate}
        currentProjectId={activeProject.get()}
        activities={activities}
      />
    </Container>
  );
}