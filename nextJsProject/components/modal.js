import React from 'react'
import Modal from 'react-modal'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faHeart } from '@fortawesome/free-solid-svg-icons'
library.add(faHeart)

const customStyles = {
  content: {
    top: '50%',
    left: '50%',
    right: 'auto',
    bottom: 'auto',
    marginRight: '-50%',
    transform: 'translate(-50%, -50%)',
    height: '50%',
    width: '30%',
    borderRadius: '20px',
    textAlign: 'center'
  },
  overlay: {
    backgroundColor: '#2E2E2E'
  }
}

// Make sure to bind modal to your appElement (http://reactcommunity.org/react-modal/accessibility/)

export default class ModalWindow extends React.Component {
  constructor() {
    super()
    this.state = {
      modalIsOpen: false
    }
    this.openModal = this.openModal.bind(this)
    this.afterOpenModal = this.afterOpenModal.bind(this)
    this.closeModal = this.closeModal.bind(this)
  }

  openModal() {
    this.setState({ modalIsOpen: true })
  }

  afterOpenModal() {
    // references are now sync'd and can be accessed.
    this.subtitle.style.color = 'black'
  }

  closeModal() {
    this.setState({ modalIsOpen: false })
  }

  render() {
    const { description } = this.props

    return (
      <div>
        <div
          style={{
            height: '100%',
            paddingTop: 16,
            display: 'flex',
            alignItems: 'center',
            flexDirection: 'column'
          }}
          onClick={this.openModal}
        >
          <button
            style={{
              color: '#2B2B2B',
              fontSize: 14,
              display: 'block',
              fontFamily: 'HiraginoSans',
              fontWeight: 300,
              textAlign: 'center',
              lineHeight: 1,
              padding: '10px 30px 10px 30px ',
              borderRadius: 10,
              background: '#2E2E2E',
              color: 'white'
            }}
          >
            Detail
          </button>
        </div>

        <Modal
          isOpen={this.state.modalIsOpen}
          onAfterOpen={this.afterOpenModal}
          onRequestClose={this.closeModal}
          style={customStyles}
          contentLabel="Example Modal"
        >
          <h2 ref={subtitle => (this.subtitle = subtitle)}>Detail</h2>
          <div>{description}</div>
        </Modal>
      </div>
    )
  }
}
