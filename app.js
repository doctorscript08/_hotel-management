// Estado do aplicativo
let state = {
  isStaffMode: false,
  clientes: [],
  reservas: [],
  quartos: {
    standard: { preco: 100, disponiveis: 10 },
    luxo: { preco: 200, disponiveis: 5 },
    suite: { preco: 300, disponiveis: 3 }
  },
  servicosExtras: {
    cafe: 25,
    estacionamento: 20
  }
};

// Funções de Utilidade
function formatarMoeda(valor) {
  return new Intl.NumberFormat('pt-BR', {
    style: 'currency',
    currency: 'BRL'
  }).format(valor);
}

function calcularValorReserva(reserva) {
  const diarias = Math.ceil((new Date(reserva.checkout) - new Date(reserva.checkin)) / (1000 * 60 * 60 * 24));
  let total = state.quartos[reserva.tipoQuarto].preco * diarias;
  
  if (reserva.servicosExtras.cafe) {
    total += state.servicosExtras.cafe * diarias;
  }
  if (reserva.servicosExtras.estacionamento) {
    total += state.servicosExtras.estacionamento * diarias;
  }
  
  return total;
}

// Funções de Gerenciamento de Interface
function showSection(sectionId) {
  document.querySelectorAll('.section').forEach(section => {
    section.classList.add('d-none');
  });
  document.getElementById(sectionId).classList.remove('d-none');
  atualizarInterface();
}

function toggleUserMode() {
  state.isStaffMode = !state.isStaffMode;
  atualizarInterface();
}

// Funções de Atualização de Interface
function atualizarInterface() {
  atualizarListaClientes();
  atualizarListaReservas();
  atualizarSelectsReserva();
  atualizarDashboard();
}

function atualizarListaClientes() {
  const lista = document.getElementById('clientes-lista');
  if (!lista) return;
  
  lista.innerHTML = state.clientes.map(cliente => `
    <tr>
      <td>${cliente.nome}</td>
      <td>${cliente.email}</td>
      <td>${cliente.telefone}</td>
      <td>
        <button class="btn btn-sm btn-primary" onclick="editarCliente(${cliente.id})">
          <i class="fas fa-edit"></i>
        </button>
        <button class="btn btn-sm btn-danger" onclick="excluirCliente(${cliente.id})">
          <i class="fas fa-trash"></i>
        </button>
      </td>
    </tr>
  `).join('');
}

function atualizarListaReservas() {
  const lista = document.getElementById('reservas-lista');
  if (!lista) return;
  
  lista.innerHTML = state.reservas.map(reserva => `
    <tr>
      <td>${reserva.id}</td>
      <td>${state.clientes.find(c => c.id === reserva.clienteId)?.nome}</td>
      <td>${reserva.tipoQuarto}</td>
      <td>${reserva.checkin}</td>
      <td>${reserva.checkout}</td>
      <td>
        <span class="status-${reserva.status.toLowerCase()}">
          ${reserva.status}
        </span>
      </td>
      <td>
        <button class="btn btn-sm btn-primary" onclick="editarReserva(${reserva.id})">
          <i class="fas fa-edit"></i>
        </button>
        <button class="btn btn-sm btn-danger" onclick="cancelarReserva(${reserva.id})">
          <i class="fas fa-times"></i>
        </button>
      </td>
    </tr>
  `).join('');
}

function atualizarSelectsReserva() {
  const clienteSelect = document.getElementById('cliente-select');
  const reservaCheckin = document.getElementById('reserva-checkin');
  const reservaCheckout = document.getElementById('reserva-checkout');
  
  if (clienteSelect) {
    clienteSelect.innerHTML = state.clientes.map(cliente => 
      `<option value="${cliente.id}">${cliente.nome}</option>`
    ).join('');
  }
  
  const reservasPendentes = state.reservas.filter(r => r.status === 'PENDING');
  const reservasAtivas = state.reservas.filter(r => r.status === 'ACTIVE');
  
  if (reservaCheckin) {
    reservaCheckin.innerHTML = reservasPendentes.map(reserva => 
      `<option value="${reserva.id}">
        ${state.clientes.find(c => c.id === reserva.clienteId)?.nome} - 
        ${reserva.tipoQuarto} (${reserva.checkin})
      </option>`
    ).join('');
  }
  
  if (reservaCheckout) {
    reservaCheckout.innerHTML = reservasAtivas.map(reserva => 
      `<option value="${reserva.id}">
        ${state.clientes.find(c => c.id === reserva.clienteId)?.nome} - 
        ${reserva.tipoQuarto} (${reserva.checkin})
      </option>`
    ).join('');
  }
}

function atualizarDashboard() {
  document.getElementById('ocupados').textContent = state.reservas.filter(r => r.status === 'ACTIVE').length;
  document.getElementById('disponiveis').textContent = 
    Object.values(state.quartos).reduce((acc, q) => acc + q.disponiveis, 0);
  
  const hoje = new Date().toISOString().split('T')[0];
  document.getElementById('checkins').textContent = 
    state.reservas.filter(r => r.checkin === hoje).length;
  document.getElementById('checkouts').textContent = 
    state.reservas.filter(r => r.checkout === hoje).length;
}

// Event Listeners
document.getElementById('cliente-form')?.addEventListener('submit', function(e) {
  e.preventDefault();
  
  const cliente = {
    id: state.clientes.length + 1,
    nome: document.getElementById('nome').value,
    email: document.getElementById('email').value,
    telefone: document.getElementById('telefone').value,
    endereco: document.getElementById('endereco').value,
    preferencias: document.getElementById('preferencias').value
  };
  
  state.clientes.push(cliente);
  this.reset();
  atualizarInterface();
});

document.getElementById('reserva-form')?.addEventListener('submit', function(e) {
  e.preventDefault();
  
  const reserva = {
    id: state.reservas.length + 1,
    clienteId: parseInt(document.getElementById('cliente-select').value),
    tipoQuarto: document.getElementById('quarto-select').value,
    checkin: document.getElementById('checkin-date').value,
    checkout: document.getElementById('checkout-date').value,
    servicosExtras: {
      cafe: document.getElementById('cafe').checked,
      estacionamento: document.getElementById('estacionamento').checked
    },
    status: 'PENDING'
  };
  
  state.reservas.push(reserva);
  this.reset();
  atualizarInterface();
});

document.getElementById('checkin-form')?.addEventListener('submit', function(e) {
  e.preventDefault();
  
  const reservaId = parseInt(document.getElementById('reserva-checkin').value);
  const reserva = state.reservas.find(r => r.id === reservaId);
  
  if (reserva) {
    reserva.status = 'ACTIVE';
    reserva.documento = document.getElementById('documento').value;
    reserva.formaPagamento = document.getElementById('pagamento').value;
  }
  
  this.reset();
  atualizarInterface();
});

document.getElementById('checkout-form')?.addEventListener('submit', function(e) {
  e.preventDefault();
  
  const reservaId = parseInt(document.getElementById('reserva-checkout').value);
  const reserva = state.reservas.find(r => r.id === reservaId);
  
  if (reserva) {
    reserva.status = 'COMPLETED';
    reserva.consumoExtra = parseFloat(document.getElementById('consumo').value);
  }
  
  this.reset();
  atualizarInterface();
});

// Inicialização
window.onload = function() {
  // Dados de exemplo
  state.clientes.push({
    id: 1,
    nome: 'João Silva',
    email: 'joao@email.com',
    telefone: '(11) 99999-9999',
    endereco: 'Rua Exemplo, 123',
    preferencias: 'standard'
  });
  
  state.reservas.push({
    id: 1,
    clienteId: 1,
    tipoQuarto: 'standard',
    checkin: '2024-01-20',
    checkout: '2024-01-25',
    servicosExtras: { cafe: true, estacionamento: false },
    status: 'PENDING'
  });
  
  showSection('dashboard');
};