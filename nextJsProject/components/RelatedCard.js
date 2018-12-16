import React from 'react'
import styled from 'styled-components'
import ModalWindow from '../components/modal.js'

export default class RelatedCard extends React.Component {
  render() {
    const { detail, image, title, description } = this.props

    return (
      <CardContainer>
        {' '}
        <CardWrapper>
          <div style={{ display: 'flex', justifyContent: 'center' }}>
            <CardTitle>{title}</CardTitle>
          </div>
          <div style={{ display: 'flex', flexDirection: 'column' }}>
            <div style={{ display: 'flex', justifyContent: 'center' }}>
              <img style={{ height: '50%', width: '70%' }} src={image} />
            </div>
            <div style={{ display: 'flex', justifyContent: 'center' }}>
              <p style={{ marginLeft: 20, marginTop: 40 }}>{description}</p>
            </div>
            <ModalWindow description={detail} />
          </div>
        </CardWrapper>
      </CardContainer>
    )
  }
}

const CardContainer = styled.div`
  height: 650px;
  width: 30%;
  margin-right: 20px;
  margin-left: 20px;
`
const CardWrapper = styled.div`
  height: 480px;
  width: 83%;
  display: flex;
  flex-direction: column;
  padding: 40px;
  background: white;
  border-radius: 30px;
`

const CardTitle = styled.h1`
  padding-bottom: 20px;
  padding-top: 20px;
  color: black;
`
